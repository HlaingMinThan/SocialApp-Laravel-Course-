<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
   function post_contact_messaage(){
    // validate our data
   $validation=request()->validate([
        "username"=>"required",
        "email"=>"required",
        "message"=>"required"
    ]);
    if($validation){
        //    get input data from input field
        $username=request('username'); //$validation['username]
        $email=request('email');
        $text=request('message');
        // dd($username,$email,$message);
        // save that data in database
        $message=new ContactMessage();
        $message->username=$username;
        $message->email=$email;
        $message->messages=$text;
        $message->save();

        return back()->with("message","message sent to admin");
    }else{
        return back()->withErrors($validation);
    }
}
function deleteMessage($id){
    // return $id;

    // find that delete data in database by id
    $deleteData=ContactMessage::find($id);
    // delete that data
    $deleteData->delete();
    return back()->with('message',"message deleted ");
}
    function editMessage($id){
        $updateData=ContactMessage::find($id);
        return view('admin.editmessage',['updateData'=>$updateData]);
    }
    function updateMessage($id){
        // validataion
        $validation=request()->validate([
            "username"=>"required",
            "email"=>"required",
            "message"=>"required",
        ]);
        if($validation){
                // find that update data in database by id
            $updateData=ContactMessage::find($id);
            // return $updateData;
            // override that data
            $updateData->username=request('username');
            $updateData->email=request('email');
            $updateData->messages=request('message');

            // update that data
            $updateData->update();
            return back()->with('message','updated'); 
        }else{
            return back()->withErrors($validation);
        }
      

       
    }
}
