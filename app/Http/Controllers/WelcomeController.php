<?php

namespace App\Http\Controllers;

use App\Models\Method;
use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $methods = Method::where('active', true)->get();
        $testimonials = Testimonial::where('isFeatured', true)->where('active', true)->latest()->take(6)->get();
        $projects = Project::where('isFeatured', true)->where('active', true)->latest()->take(6)->get();
        return view('welcome', compact('methods', 'testimonials', 'projects'));
    }
}
