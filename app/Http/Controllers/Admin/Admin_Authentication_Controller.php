<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use App\Models\Admin\Chapter;
use App\Models\Admin\Content;
use App\Models\Admin\Subject;
use App\Models\Admin\Unit;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Admin_Authentication_Controller extends Controller
{
    public function admin_login(){

        return view('admin_authentication.adminlogin');
    }

    public function admin_dashboard(){
                $subject = Subject::count();
                $unit = Unit::count();
                $chapter = Chapter::count();
                $video = Content::count();
                $user = User::count();
        return view('admin_dashboard.admin_dashboard',["subject"=>$subject,"unit"=>$unit,"chapter"=>$chapter,"video"=>$video,"user"=>$user]);
    }

    public function admin_post_login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Please enter your email',
            'password.required' => 'Please enter your password',
        ]);

        $user = Admin::where('email', '=', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('fail','Your Account Doesnt Exist,Please Check the account');
        } else {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('AdminID', $user->id);
                return redirect('admin-dashboard')->with('success','You have Logged in suceesfully');
            } else {
                return back()->with('fail','Your Password is Incorrect');
            }
        }
    }

    public function admin_logout()
    {
        if(Session()->has('AdminID')) {
            Session()->pull('AdminID');
            return redirect('admin-login')->with('success','You have Logged out successfully');
        }else{

            return redirect()->back()->with('info','You didnt loggedin yet !');
        }
    }
}
