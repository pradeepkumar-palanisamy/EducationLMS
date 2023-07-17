<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Content;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    public function post_add_content(Request $request){

        $content = new Content();
        $content->subject_id = $request->subject_id;
        $content->unit_id = $request->unit_id;
        $content->chapter_id = $request->chapter_id;
        $content->content_url = $request->content_url;
        $content->content_slug = Str::slug($request->content_url);
        $result = $content->save();

        if($result){
            return redirect()->back()->with('success','Your new content has been successfully created');
        }else{
            return redirect()->back()->with('fail','something went wrong while adding content');
        }
    }
}
