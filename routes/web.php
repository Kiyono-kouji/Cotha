<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/projects', [ProjectController::class, 'index']);

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{slug}', [CourseController::class, 'show'])->name('courses.show');