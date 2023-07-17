<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin\Unit;

class Unitcontroller extends Controller
{


    public function edit_unit($slug){
            $edit_unit = Unit::where('unit_slug',$slug)->first();
            $subject = Subject::get();
        return view('admin_education.edit_unit',["edit_unit"=>$edit_unit,"subject"=>$subject]);
    }
    public function post_add_unit(Request $request){

        $unit = new Unit();
        $unit->subject_id =$request->subject_id;
        $unit->unit_name = $request->unit_name;
        $unit->unit_slug = str::slug($request->unit_name);
        $unit->unit_desc = $request->unit_desc;
        $result = $unit->save();

        if($result){
            return redirect()->back()->with('success','A unit has succesfully created');
        }else{
            return back()->with('fail','Something went wrong');
        }


    }

    public function post_edit_unit(Request $request){

        $id = $request->id;

        $updateunit = [
            'unit_name'=>$request->unit_name,
            'unit_slug'=>str::slug($request->unit_name),
            'unit_desc'=>$request->unit_desc,
            'unit_status'=>$request->unit_status
        ];

        $update = Unit::where('id',$id)->update($updateunit);

        if($update){

            return redirect('admin-unit')->with('success','Unit has been updated successfully');
        }else{
            return back()->with('fail','Something went wrong while updating unit');
        }
    }

    public function delete_unit(Request $request)
    {
        $id = $request->id;
        $unit = Unit::find($id);
    
        if ($unit) {
            $result = $unit->delete();
    
            if ($result) {
                return redirect()->back()->with('success', 'Unit has been successfully deleted');
            } else {
                return redirect()->back()->with('fail', 'Some error occurred while deleting the unit');
            }
        } else {
            return redirect()->back()->with('fail', 'Unit not found');
        }
    }
    
}
