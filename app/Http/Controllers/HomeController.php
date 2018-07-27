<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Student;
use App\Ctime;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::OrderBy('id', 'desc')->get();
        $courses=Course::all();
        $ctimes=Ctime::OrderBy('id', 'desc')->get();
        return view('home')->with(['courses'=>$courses])->with(['students'=>$students])->with(['ctimes'=>$ctimes]);
    }
    public function getByBatch($name){

        $ct=Ctime::where('batch', $name)->first();
        $id=$ct->id;

        $students=Student::where('ctime_id', $id)->OrderBy('id', 'desc')->get();
        $courses=Course::all();
        $ctimes=Ctime::OrderBy('id', 'desc')->get();
        return view('home')->with(['courses'=>$courses])->with(['students'=>$students])->with(['ctimes'=>$ctimes]);
    }

    public function getByCourse($course){
        $co=Course::where('course_name', $course)->first();
        $id=$co->id;
        $students=Student::where('course_id', $id)->OrderBy('id', 'desc')->get();
        $courses=Course::all();
        $ctimes=Ctime::OrderBy('id', 'desc')->get();
        return view('home')->with(['courses'=>$courses])->with(['students'=>$students])->with(['ctimes'=>$ctimes]);


    }
    public function postUpdate(Request $request){
        $id=$request['id'];
        $st=Student::where('id', $id)->first();
        $db_payment=$st->student_payment;
        $new_payment=$db_payment+$request['payment'];
        $st->student_payment=$new_payment;
        $st->update();
        return redirect()->back();
    }
    public function getNewStudent(Request $request){
        $studentName=$request['studentName'];
        $student_payment=$request['student_payment'];
        $course_id=$request['course_id'];
        $ctime_id=$request['ctime_id'];

        if($studentName){

            $st=new Student();
            $st->studentName=$studentName;
            $st->student_payment=$student_payment;
            $st->course_id=$course_id;
            $st->ctime_id=$ctime_id;
            $st->save();
            echo "<li class='alert alert-success'>The new student have been successfully added.</li>";

        }else{
            echo "<li class='alert alert-danger'>The student name field is required.</li>";

        }




    }
}
