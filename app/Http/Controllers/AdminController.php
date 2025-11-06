<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function courses()
    {
        $courses = Course::all();
        return view('admin.courses', compact('courses'));
    }

    public function classes()
    {
        $classes = ClassModel::all();
        return view('admin.classes', compact('classes'));
    }
}
