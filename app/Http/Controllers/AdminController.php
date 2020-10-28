<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('admin.index');
    }
    function manage_premium_users(){
        $users=User::all();
        return view("admin.manage-premium-users",['users'=>$users]);
    }

    function deleteUser($id){
    //    find that delete user in user table by id
        $deleteuser=User::find($id);
        // delete that user
       $deleted= $deleteuser->delete();
       if($deleted){

           return back()->with('message',"delete user");
       }
    }

    function contact_messages(){
        $messages=ContactMessage::latest()->get();
        return view("admin.contact-messages",['messages'=>$messages]);
    }
    function editUser($id){
        $updateUser=User::find($id);
        return view("admin.editUser",['updateUser'=>$updateUser]);
    }
    function updateUser($id){
    
        $validation=request()->validate([
            "name"=>"required",
            "email"=>"required",
            "isAdmin"=>"required",
            "isPremium"=>"required",
        ]);
        if($validation){
            //    grab that user from user table by id
            $updateUser=User::find($id);
             // override that user data
            $updateUser->name=request('name');
            $updateUser->email=request('email');
            $updateUser->isAdmin=request('isAdmin');
            $updateUser->isPremium=request('isPremium');

            $updateUser->update();
            return back()->with("message","user updated");
        }else{
            return back()->withErrors($validation);
        }

   

    }
}
