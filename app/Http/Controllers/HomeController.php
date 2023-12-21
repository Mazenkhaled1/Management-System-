<?php

namespace App\Http\Controllers;

use App\Models\Artical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() 
    { 
       if(auth::id())
       { 
        
        $artical = Artical::where('post_status','active')->get() ;  
        $userTyper = Auth::user()->userType; 
        if($userTyper == 'user') 
        {
             return view('home.homepage');
        }
        else if($userTyper == 'admin')
        {
            return view('admin.adminDashboard');
        }
       } else {
        
        return redirect()->back() ;
       } 
    }

    // public function post() 
    
    // {
    //     return view('post');
    // }

    public function homePage() 
    {
         return view('home.homePage') ;
    }


}