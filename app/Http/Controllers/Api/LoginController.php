<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Traits\ApiTrait;
use auth ;
use App\Http\Controllers\Controller;



class LoginController extends Controller
{
    use ApiTrait;

    public function login(Request $request)  
    
    {
        // dd($request->all()) ;
        $credentials = $request->only("email","password");
        if(auth()->attempt($credentials) && (auth()->user()->userType == 'user'))
        {
            // create token 
            $token  = auth()->user()->createToken($request->DeviceName ?? $request->userAgent())->plainTextToken ;
             // return response 
            return $this->apiResponse('201' , 'User Loging Successfully' , 'null' ,$token )  ;
        } 
        return $this->apiResponse('401' , 'Invaled Credentials' , 'null' ,'null' )  ;

    }

    public function logout(Request $request)    
    {
        $request->user()->currentAccessToken()->delete(); 
        return $this->apiResponse('200', 'User Logout Successfully' ,'null' ,'null') ;
    }
}


//"2|qaiH6Lv5QuOXxaO7cOw9NveSIQaWykuJCGXdQmlKced219b6"