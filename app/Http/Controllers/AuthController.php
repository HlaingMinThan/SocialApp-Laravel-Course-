<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // login
    function login(){
        return view("auth.Login");
    }
   function post_login(){
    //    validate our input field
    $validation=request()->validate([
        "email"=>"required",
        "password"=>"required",
        ]);

    // if validation success
    if($validation){

        // if auth is success or not
        $auth=Auth::attempt(["email"=>request('email'),'password'=>request('password')]);
        if($auth){
            // go to home page
            return redirect()->route('home');
        }else{
            // else return backk with auth failed error
            return back()->with('error','Authentication Failed Try again');
        }


    }else{
        // go back login page with errors
        return back()->withErrors($validation);
    }
    // else 
   }




    // register
    function register(){
        return view("auth.Register");
    }
    function post_register(){
       $validation=request()->validate([
            "username"=>"required",
            "email"=>"required",
            "password"=>"required||min:8||confirmed",
            "image"=>"required",
        ]);

        // return $validation;
        if($validation){
            // move our image file to public
            $image=request('image');
            $image_name=uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path('images/profiles'),$image_name);
            
            
            // datbase save to user table
            $password=$validation['password'];
            $user=new User();
            $user->name=$validation['username'];
            $user->email=$validation['email'];
            $user->password=Hash::make($password);
            $user->image=$image_name;

            // take 1second or 2second to save a data in database
            $user->save(); 
            
            if(Auth::attempt(["email"=>request('email'),'password'=>request('password')])){

                return redirect()->route('home');
            }
            
    
        }else{
            return back()->withErrors($validation);
        }
    }
    function post_userProfile(){
        $name=request('name'); //Hlaing Min Than
        $email=request('email');//hmt@gmail.com
        $image=request('image'); //file
        $old_password=request('old_password');
        $new_password=request('new_password');

        // if user is not select image and not change password
            // add name and email to current user's id;
        $id=auth()->user()->id;//1
        $current_user=User::find($id);
        $current_user->name=$name;
        $current_user->email=$email;
       
        if($image){
            // move file to public path
            $imageName=uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path('images/profiles/'),$imageName); //1.jpg //1.jpg(1)
            // save imagename to current user id ;
            $current_user->image=$imageName;
            $current_user->update();
            return back()->with('success',"image changed");
        }


        if($old_password && $new_password){
            // check user's input old pw is same as current user pw in db //12345678 ==$2y10asfasdfasdfasdfsf
           if(Hash::check($old_password,$current_user->password)){
               // if same
               // let user to change new pw
               $current_user->password=Hash::make($new_password);
               $current_user->update();
               return back()->with('success',"password changed");
           }else{
            return back()->with('error',"old password is not same");
           }
        }
        $current_user->update();
        return back();

        
    }
    // logout

    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
