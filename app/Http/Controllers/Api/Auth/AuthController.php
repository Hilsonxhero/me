<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Services\ApiService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        ApiService::Validator($request->all(), [
            'email' => ['required','email'],
            'password' => ['required']
        ]);


        return response()->json([
            'data' => "login page"
        ]);

    }
}
