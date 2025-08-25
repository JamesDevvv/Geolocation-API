<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\SearchHistories;

class UserService
{
   
   public function login(Request $request)
{
    $credentials = $request->validate([
        'email'    => ['required','email'],
        'password' => ['required','string'],
    ]);

    $user = User::where('email', $credentials['email'])->first();

    if (!$user) {
        return response()->json(['message' => 'Invalid email'], 401);
    }

    if (!\Illuminate\Support\Facades\Hash::check($credentials['password'], $user->password)) {
        return response()->json(['message' => 'Invalid password'], 401);
    }

    
    $ip = $request->ip();

    
    $geo = \Illuminate\Support\Facades\Http::get("http://ip-api.com/json/{$ip}")->json();

    
    $user->update([
        'ip' => $ip,
        'geo_info' => json_encode($geo),
    ]);

    
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'token' => $token,
        'user'  => [
            'id'    => $user->id,
            'name'  => $user->name,
            'email' => $user->email,
            'ip'    => $user->ip,
            'geo'   => json_decode($user->geo_info, true),
        ],
    ]);
}

   
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()?->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }

    
    public function me(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
        ]);
    }

    
    public function home(Request $request)
    {
        $ip = $request->ip();

        
        $geo = Http::get("http://ip-api.com/json/{$ip}")->json();

        return response()->json([
            'ip'  => $ip,
            'geo' => $geo,
        ]);
    }

    
    public function searchIp(Request $request)
    {
        $request->validate([
            'ip' => 'required|ip'
        ]);

        $ip = $request->ip;

        $geo = Http::get("http://ip-api.com/json/{$ip}")->json();

        
      $history =  SearchHistories::create([
        'user_id' => $request->user()->id,
        'ip'      => $ip,
        'geo'     => json_encode($geo),
    ]);



        return response()->json([
            'message' => 'Search successful',
            'ip'      => $ip,
            'geo'     => $geo,
            'history' => $history
        ]);
    }

 
    public function clearSearch(Request $request)
    {
        $ip = $request->ip();
        $geo = Http::get("http://ip-api.com/json/{$ip}")->json();

        return response()->json([
            'message' => 'Cleared, showing logged user IP',
            'ip'  => $ip,
            'geo' => $geo
        ]);
    }

    public function history(Request $request)
    {
        $histories = SearchHistories::where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return response()->json([
            'history' => $histories
        ]);
    }

    public function showHistory(Request $request, $id)
    {
        $history = SearchHistories::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        return response()->json([
            'ip'  => $history->ip,
            'geo' => $history->geo,
        ]);
    }

   
    public function deleteHistories(Request $request)
    {
        
        $request->validate([
            'ids' => 'required|array'
        ]);

        SearchHistories::where('user_id', $request->user()->id)
            ->whereIn('id', $request->ids)
            ->delete();

        return response()->json([
            'message' => 'Histories deleted successfully'
        ]);
    }
}
