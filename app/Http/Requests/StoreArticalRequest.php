<?php

namespace App\Http\Requests;

class StoreArticalRequest extends FormRequest
{
    

    public function rules(): array
    {
        return [
        'name' => 'required|min:3|max:255|string',
        'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048 '  , 
        'title' =>'required|string', 
        'desription'=>'required|string'
        ];
    }

 
} 