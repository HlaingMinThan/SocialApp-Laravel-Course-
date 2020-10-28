<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // delete
    function deletePost($id){
        // get delete post by id
        $delete_post=Post::find($id);
        // delete that post
        $delete_post->delete();
        return redirect()->route('home')->with('message',"deleted"); 
    }
    // update
    function updatePost($id){
        // get input data from edit post blade
        $title=request('title');
        $image=request('image');
        $content=request('content');
        // update data in database
            // require updata id
        $update_data=Post::find($id);
        $update_data->title=$title;
        $update_data->content=$content;
        // image
       if($image){

           $imageName=uniqid()."_".$image->getClientOriginalName();
           $image->move(public_path('images/posts'),$imageName);
           $update_data->image=$imageName;
       }

        $update_data->update();
        return back()->with('message',"data updated");
        // return $imageName;
    }
    // create
    function create_post(){
        $validation=request()->validate([
            "title"=>'required',
            "image"=>'required',
            "content"=>'required'
        ]);
        if($validation){
            $title=request('title');
            $image=request('image'); //file
            $content=request('content');
            // save data to database
            $post=new Post();
            $post->user_id=auth()->user()->id;
            $post->title=$title;
            // image
            $imageName=uniqid()."_".$image->getClientOriginalName();//asfas_1.jpg //dsfasdf_1.jpg
            $image->move(public_path("images/posts/"),$imageName);
            $post->image=$imageName;
            $post->content=$content;
            $post->save();
            return redirect()->route("home")->with("message","post added");
        }else{
            return back()->withErrors($validation);
        }
    }
}
