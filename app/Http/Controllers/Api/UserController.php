<?php

namespace App\Http\Controllers\Api;


use App\Events\NewArticalEvent;
use App\Models\Artical;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticalRequest;
use App\Http\Traits\ApiTrait;
use Illuminate\Support\str ;
use Illuminate\Support\Facades\Storage ;  


class UserController extends Controller
{
    use ApiTrait;
    public function index() 
    {
        $artical = Artical::where('post_status','active')->get();
        return response()->json($artical);
    }

    public function store(StoreArticalRequest $request) 
    { 

        try { 
            
            $imageName = str::random(32) . "." . $request->image->getClientOriginalExtension();
            $artical = Artical::create(
            [
               'name' => $request->name , 
                'image' => $imageName ,
                'title '=> $request->title ,
                'desription' =>$request->desription ,
            ]
        );
        event(new NewArticalEvent($artical) ) ;
         // part of sending email notifiaction
        storage::disk('public')->put($imageName , file_get_contents($request->image));
         return $this->apiResponse('200' , 'Post Created Successfully' , 'null' , $artical) ;

        }
        
        catch (\Exception $e) { 
            return $this->apiResponse('401', 'Post Error' , $e->getMessage() , 'null') ;
        }
    }

    public function update(Request $request , $id )
    {
        $artical = Artical::find($id) ; 
        if(is_null($artical)) 
        {
            return $this->apiResponse('404' , 'Post Not Found' , 'null' , 'null') ;
        }

        $artical->update($request->all()) ;
        return $this->apiResponse('200' , 'Post Updated Successfully' , 'null' , $artical) ;
    }

    public function destroy($id) { 
        $artical = Artical::find($id) ; 
        if(is_null($artical)) 
        {
            return $this->apiResponse('404' , 'Post Not Found' , 'null' , 'null') ;
        }

        $artical->delete() ;
        return $this->apiResponse('200' , 'Post Deleted Successfully' , 'null' , $artical) ;
    }
 
}