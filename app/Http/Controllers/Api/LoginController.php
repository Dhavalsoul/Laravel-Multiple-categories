<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
    	$login = $request->validate{[
    		'email' => 'required|string',
    		'password' => 'required|string'
    	]};

    	if(!Auth::attempt($login)){
    		return responce(['message' => 'Invalid login credentials.']);
    	} 

    	$accesstoken = Auth::user()->createToken('authToken')->accessToken;

    	return responce(['user' => Auth::user(), 'access_token' => $accesstoken]);
    }
}
