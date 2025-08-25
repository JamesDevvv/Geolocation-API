<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(Request $request)
    {
       
        return $this->userService->login($request);
    }

    public function logout(Request $request)
    {
        return $this->userService->logout($request);
    }

    public function me(Request $request)
    {
        return $this->userService->me($request);
    }

    
    public function home(Request $request)
    {
        return $this->userService->home($request);
    }

    
    public function searchIp(Request $request)
    {
        return $this->userService->searchIp($request);
    }

    
    public function clearSearch(Request $request)
    {
        return $this->userService->clearSearch($request);
    }

    
    public function history(Request $request)
    {
        return $this->userService->history($request);
    }

    
    public function showHistory(Request $request, $id)
    {
        return $this->userService->showHistory($request, $id);
    }

    
    public function deleteHistories(Request $request)
    {
        return $this->userService->deleteHistories($request);
    }
}
