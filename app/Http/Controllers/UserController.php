<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() 
    { 
        return view("home.homePage");
    }

    public function create() 
    { 
        return view("home.create");
    }
}