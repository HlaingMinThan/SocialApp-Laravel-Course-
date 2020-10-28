<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;

class PostRoleCheckMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
         // or gate
        // check current user is premium user or not
        // check current user is admin  or not
        //check that post is current user's post
        
        // 1post id 
        $id=request('id');//delete or update post id
       // 2(user_id or authorID)
       $authorId=Post::find($id)->user_id;
       //3 currentuserId==authorId
       
        if(auth()->user()->isPremium=="1" || auth()->user()->isAdmin=="1" || auth()->user()->id==$authorId){
            return $next($request);//delete update (post)
        }else{
            return redirect()->route('home')->with("errors","U r not premium user or admin");
        }
            
    }
}
