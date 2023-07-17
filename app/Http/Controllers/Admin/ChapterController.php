<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Subject;
use App\Models\Admin\Unit;

class ChapterController extends Controller
{
    public function post_add_chapter(Request $request){

        $chapter = new Chapter();
        $chapter->subject_id = $request->subject_id;
        $chapter->unit_id = $request->unit_id;
        $chapter->chapter_name = $request->chapter_name;
        $chapter->chapter_slug = str::slug($request->chapter_name);
        $chapter->chapter_desc = $request->chapter_desc;
        $result = $chapter->save();

        if($result){
            return redirect()->back()->with('success','The Chapter has been added successfully');
        }else{
            return back()->with('fail','Something went wrong');
        }

    }


    public function post_edit_chapter(Request $request)
    {
        $id = $request->id;

        $updatedata = [
            'subject_id' => $request->subject_id,
            'unit_id' => $request->unit_id,
            'chapter_name' => $request->chapter_name,
            'chapter_slug' => Str::slug($request->chapter_name),
            'chapter_desc' => $request->chapter_desc,
            'chapter_status' =>$request->chapter_status
        ];

        $update = Chapter::where('id', $id)->update($updatedata);

        if ($update) {
            return redirect('admin-chapter')->with('success', 'The Chapter has been updated successfully');
        } else {
            return redirect()->back()->with('fail', 'Some error occurred while updating the chapter');
        }
    }

    public function edit_chapters($slug){
            $edit_chapter = Chapter::where('chapter_slug',$slug)->first();
            $subject = Subject::get();
            $unit = Unit::get();

        return view('admin_education.edit_chapter',["edit_chapter"=>$edit_chapter,"subject"=>$subject,"unit"=>$unit]);
    }

    public function delete_chapter(Request $request)
{
    $id = $request->id;
    $chapter = Chapter::find($id);

    if ($chapter) {
        $result = $chapter->delete();

        if ($result) {
            return redirect()->back()->with('success', 'Chapter has been successfully deleted');
        } else {
            return redirect()->back()->with('fail', 'Some error occurred while deleting the chapter');
        }
    } else {
        return redirect()->back()->with('fail', 'Chapter not found');
    }
}


}
