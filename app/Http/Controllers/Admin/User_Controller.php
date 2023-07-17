<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class User_Controller extends Controller
{
    public function all_user(){
                $user = User::get();
        return view('admin_users.all_user',["user"=>$user]);
    }

    public function edit_all_users($username){
            $edit_user = User::where('username',$username)->first();
        return view('admin_users.edit_all_users',["edit_user"=>$edit_user]);
    }

    public function post_user_registration(Request $request){

            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->city = $request->city;
            $user->state = $request->state;
            $result = $user->save();

            if($result){

                return redirect()->back()->with('success','user has been created successfully');
            }else{
                return back()->with('fail','An error occured while adding user');
            }
    }

    public function admin_update_user(Request $request){
            $id = $request->id;
        $update = [
            'username'=>$request->username,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'city'=>$request->city,
            'state'=>$request->state,
            'user_status'=>$request->user_status
        ];

        $user = User::where('id',$id)->update($update);

        if($user){
            return redirect('all-user')->with('success','user has been successfully updated');

        }else{
            return back()->with('Something went wrong');
        }
    }

    public function admin_delete_user(Request $request){
        $id = $request->input('id');

        $user = User::find($id);

        if($user){
            $user->delete();
            return redirect('all-user')->with('success', 'User has been successfully deleted');
        } else {
            return back()->with('fail', 'User not found');
        }
    }


}
