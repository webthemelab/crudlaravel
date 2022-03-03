<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    ///Add teacher information

    public function addTeacher(){


        $teachers= Teacher::latest()->get();
        return view('teacher.add_teacher',compact('teachers'));
    }//end method

    //store Teacher Information
    public function storeTeacher(Request $request){


        //form Validation
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ],[
            'name.required'=>'You have to Enter your name',
            'email.required'=>'You have to Enter your email',
            'phone.required'=>'You have to Enter your phone'
        ]);

        Teacher::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone
        ]);
        return redirect('/add/teacher')->with('sms','Student Information Save successfully');

    }//end method

    //Edit Teacher Information
    public function editTeacher($id){


        $teacher= Teacher::find($id);
        // return $teacher;
        // exit();
        return view('teacher.edit_teacher',compact('teacher'));

    }//end method

    //Update Teacher Information
    public function updateTeacher(Request $request){

        $teacher=teacher::find($request->teacher_id);
        $teacher->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ]);
        return redirect('/add/teacher')->with('sms','Teacher Information update successfully');

    }//end method

     //Delete teacher information
     public function deleteTeacher($id){

        $teacher =Teacher::find($id);
        $teacher->delete();
        return redirect('/add/teacher')->with('sms','Teacher information Delete successfully');

    }//end method




}//end class
