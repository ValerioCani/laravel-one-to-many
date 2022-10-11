<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index(){
        $students = Student::all();
        return view('admin.students', ['students'=>$students]);
    }
}
