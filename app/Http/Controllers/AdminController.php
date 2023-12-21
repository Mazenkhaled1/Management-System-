<?php

namespace App\Http\Controllers;

use App\Models\Artical;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() 
    {
        $allArticals = Artical::all(); 
        
         return view("admin.all_articals" ,compact('allArticals'));
    }

    public function accept($id)
    {
        $data = Artical::findorFail($id);
        $data->post_status = 'active' ;
        $data->save();  
        return redirect()->back();
    }

    public function reject($id)
    {
        $data = Artical::findorFail($id);
        $data->post_status = 'reject' ;
        $data->save();  
        return redirect()->back();
    }
    
}