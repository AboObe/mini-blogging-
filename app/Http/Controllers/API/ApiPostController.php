<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class ApiPostController extends Controller
{
    
    public function myPosts()
    {
        $user =  auth('sanctum')->user()  ;
        
        $postes = Post::select('title','created_at')->
                        where('user_id', $user->id)->
                        get();


        return response()->json($postes);
    }
}
