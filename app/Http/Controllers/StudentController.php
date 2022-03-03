<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){

        $students = Student::latest()->get();
        return view('student.insert_student',compact('students'));

    }//end method

    //store student information
    public function storeStudent(Request $request){

        //form validation
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required'

        ],[
            'name.required'=>'you have to enter your name',
            'email.required'=>'you have to enter your email',
            'phone.required'=>'you have to enter your phone',
        ]);

    //data insert
    Student::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone
        ]);

        return redirect('/')->with('sms', 'Student Information Save successfully');

    }//end method

    //Edit student information
    public function editStudent($id){
        $student=Student::find($id);
        //return $student;

        return view('student.edit_student', compact('student'));

    }//end method

    //update student information
    public function updateStudent(Request $request){

        $student= Student::find($request->student_id);

        $student->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,

        ]);

        return redirect('/')->with('message','Student Information Save successfully');

    }//end method

    //delete student information
    public function deleteStudent($id){


        $student =Student::find($id);
        $student->delete();
        return redirect('/')->with('message','Student info deleted successfully');

    }//end method









}//end class
