<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Admin_Authentication_Controller;
use App\Http\Controllers\Admin\Admin_Extra_Controller;
use App\Http\Controllers\Admin\Education_Controller;
use App\Http\Controllers\Admin\Unitcontroller;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\User_Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//admin Authentication Routes

Route::get('admin-login',[Admin_Authentication_Controller::class, 'admin_login']);
Route::post('admin_post_login',[Admin_Authentication_Controller::class, 'admin_post_login'])->name('admin_post_login');
Route::get('admin-logout',[Admin_Authentication_Controller::class, 'admin_logout']);

//admin dashboard routes

Route::get('admin-dashboard',[Admin_Authentication_Controller::class, 'admin_dashboard']);

//education routes

Route::get('admin-subject',[Education_Controller::class, 'a_subject']);
Route::get('admin-unit',[Education_Controller::class, 'a_unit']);
Route::get('admin-chapter',[Education_Controller::class, 'a_chapter']);
Route::get('admin-content',[Education_Controller::class, 'a_content']);
Route::post('add_subject',[Education_Controller::class, 'add_subject'])->name('add_subject');
Route::get('edit_subject/{slug}',[Education_Controller::class, 'edit_subject']);
Route::post('post_edit_subject',[Education_Controller::class, 'post_edit_subject'])->name('post_edit_subject');
Route::post('delete_subject',[Education_Controller::class, 'delete_subject'])->name('delete_subject');

//unit routes

Route::post('post_add_unit',[Unitcontroller::class, 'post_add_unit'])->name('post_add_unit');
Route::post('post_edit_unit',[Unitcontroller::class, 'post_edit_unit'])->name('post_edit_unit');
Route::get('edit-unit/{slug}',[Unitcontroller::class, 'edit_unit']);
Route::post('delete_unit',[Unitcontroller::class, 'delete_unit']);

//chapter routes

Route::post('post_add_chapter',[ChapterController::class, 'post_add_chapter'])->name('post_add_chapter');
Route::post('post_edit_chapter',[ChapterController::class, 'post_edit_chapter'])->name('post_edit_chapter');
Route::get('edit-chapter/{slug}',[ChapterController::class, 'edit_chapters']);
Route::post('delete_chapter',[ChapterController::class, 'delete_chapter'])->name('delete_chapter');

//content routes

Route::post('post_add_content',[ContentController::class,'post_add_content'])->name('post_add_content');

//user Routes

Route::get('all-user',[User_Controller::class,'all_user']);
Route::post('post_user_registration',[User_Controller::class,'post_user_registration'])->name('post_user_registration');
Route::post('admin_update_user',[User_Controller::class,'admin_update_user'])->name('admin_update_user');
Route::post('admin_delete_user',[User_Controller::class,'admin_delete_user'])->name('admin_delete_user');
Route::get('edit-all-users/{username}',[User_Controller::class,'edit_all_users']);

//extra routes
Route::get('admin-about',[Admin_Extra_Controller::class,'admin_about']);
