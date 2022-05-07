<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 
    public function store(Request $request){
        $query = new query; 
        $query->first_name = $request->first_name;
        $query->last_name = $request->last_name;
        $query->phone_number = $request->phone_number; 
        $query->save();
        return redirect('add-user.php?msg=success')->with('status', 'Blog Post Form Data Has Been inserted');
    }

    public function viewData(){ 
        $User = User::all();
        return  view('view-users',['Users'=>$User]);
    }

    public function addData(Request $request){
        $query = new User;
       // return $query->input;
        $validation = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'phone_number'=>'required',
            'dob'=>'required',
            'post_code'=>'required',
            'email'=>'required',
            'password'=>'required',
            'user_type'=>'required'
            
        ]);
        if($validation){
            $password = $request->password;  
            $password = bcrypt($password);
            $query->first_name = $request->first_name;
            $query->last_name = $request->last_name;
            $query->parent_id = $request->parent_id;
            $query->phone_number = $request->phone_number;
            $query->dob = $request->dob; 
            $query->post_code = $request->post_code; 
            $query->address = $request->address; 
            $query->email = $request->email; 
            $query->password = $password;
            $query->user_type = $request->user_type;  
            $query->created_at = $request->created_at;   
            $query->save();
            return redirect('users/view-users')->with('message', 'User Added Successfuly'); 
        };
    }

    public function editData($id){
        $User = User::find($id); 
        return  view('edit-user',['User'=>$User]); 
    }

    public function deleteData($id){
        $User = User::find($id);
        $User->delete();
        return redirect("view-users/")->with('message', 'User Deleted Successfuly');
    }

    public function updateData(Request $request){
        // echo '<pre>';
        // print_r($request);
        // die();
        $password = $request->password;  
        $password = bcrypt($password);
        $ID = $request->id;
        $query = User::find($request->id);
        //return $request->id;
        $query->first_name = $request->first_name;
        $query->last_name = $request->last_name;
        $query->phone_number = $request->phone_number;
        $query->dob = $request->dob; 
        $query->post_code = $request->post_code; 
        $query->address = $request->address; 
        $query->email = $request->email; 
        $query->password = $password;
        $query->user_type = $request->user_type;  
        $query->created_at = $request->created_at;   
        $query->save();
        return redirect("edit-user/$ID")->with('message', 'User Updated Successfuly');
    }
    
} 