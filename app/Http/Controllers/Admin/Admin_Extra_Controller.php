<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Admin_Extra_Controller extends Controller
{
    public function admin_about(){

        return view('admin_extra.admin_about');
    }
}
