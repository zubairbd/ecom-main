<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StrudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->get();
        return view('admin.student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /** Validate name field */
        $request->validate([
            'name'=>'required|unique:students,name',
        ]);

//        Student::insert([
//            'name'=> $request->name,
////            'student_id'=>Helper::IDGenerator(new Student, 'student_id', 2, 'STD'), /** Generate id */
//            'created_at'=> Carbon::now()
//        ]);
//        return Redirect()->back()->with('success','Brand added');

        $student_name = $request->name;
        $student_id = Helper::IDGenerator(new Student, 'student_id', 2, 'STD'); /** Generate id */

        $student = new Student();
        $student->student_id = $student_id;
        $student->name = $student_name;
        $student->save();

        return Redirect()->back()->with('success','Brand added');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return Redirect()->back()->with('delete','Student Deleted');
    }
}
