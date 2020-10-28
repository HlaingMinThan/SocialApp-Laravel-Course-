<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    function index(){
        $posts=Post::latest()->get(); //51-1
        return view('Index',['posts'=>$posts]);
    }
        
        



    function createPost(){
        return view('user.Create');
    }

    // show post by id
    function showPostById($id){
        $post=Post::find($id);
        return view("user.showPost",["post"=>$post]);
    }
    

    function editPost($id){
        $updateData=Post::find($id);
        return view("user.editPost",['updateData'=>$updateData]);
    }

    // user profile
    function userProfile(){
        return view(('user.Userprofile'));
    }
    



    

    function contactUs(){
        return view('user.ContactUs');
    }

   



            
       

}
