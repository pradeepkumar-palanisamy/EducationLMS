<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Subject;
use App\Models\Admin\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Education_Controller extends Controller
{
    public function a_subject(){
            $subject = Subject::get();
            
        return view('admin_education.a_subject',["subject"=>$subject]);
    }

    public function a_unit(){
            $subject = Subject::get();
            $unit = DB::table('geo_unit')
            ->join('geo_subject', 'geo_unit.subject_id', '=', 'geo_subject.id')
            ->select('geo_unit.id', 'geo_unit.*', 'geo_subject.id as subject_id', 'geo_subject.subject_name')
            ->get();
        
        return view('admin_education.a_unit',["subject"=>$subject,"unit"=>$unit]);
    }

    public function a_chapter(){
                $subject = Subject::get();
                $unit = Unit::get();
                $chapter = DB::table('geo_chapters')
                ->join('geo_unit', 'geo_chapters.unit_id', '=', 'geo_unit.id')
                ->join('geo_subject', 'geo_chapters.subject_id', '=', 'geo_subject.id')
                ->select('geo_subject.*', 'geo_unit.*', 'geo_chapters.*')
                ->orderBy('geo_chapters.created_at', 'desc')
                ->get();
    
                    
        return view('admin_education.a_chapter',["subject"=>$subject,"unit"=>$unit,"chapter"=>$chapter]);
    }

    public function a_content(){

        return view('admin_education.a_content');
    }

    public function edit_subject($slug){
            $edit_subject = Subject::where('subject_slug',$slug)->first();
        return view('admin_education.edit_subject',["edit_subject"=>$edit_subject]);
    }

    public function add_subject(Request $request){

            $subject = new Subject();
            $subject->subject_name = $request->subject_name;
            $subject->subject_slug = str::Slug($request->subject_name);
            $subject->subject_desc = $request->subject_desc;
            $result = $subject->save();

            if($result){
                return redirect()->back()->with('success','Subject has been successfully added');
            }else{
                return redirect()->back()->with('fail','Some error happened while adding subject');
            }
    }

    public function post_edit_subject(Request $request){
            $id = $request->id;
            $updatedata = [
                'subject_name'=>$request->subject_name,
                'subject_slug'=> str::slug($request->subject_name),
                'subject_desc'=>$request->subject_desc,
                'status'=>$request->status,
            ];

            $update = Subject::where('id',$id)->update($updatedata);

            if($update){

                return redirect('admin-subject')->with('success','Subject has updated successfully');
            }else{
                return redirect()->back()->with('fail','Some error occured while updating subject');
            }
    }

    public function delete_subject(Request $request)
{           
        $id = $request->id;
        $subject = Subject::where('id', $id)->first();

    if ($subject) {
        $result = $subject->delete();

        if ($result) {
            return redirect()->back()->with('success', 'Subject has been successfully deleted');
        } else {
            return redirect()->back()->with('fail', 'Some error occurred while deleting the subject');
        }
    } else {
        return redirect()->back()->with('fail', 'Subject not found');
    }
}

}
