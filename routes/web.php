<?php

use App\Http\Controllers\Admin\AdminClassController;
use App\Http\Controllers\Admin\AdminLevelController;
use App\Http\Controllers\Admin\AdminMethodController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/levels', [LevelController::class, 'index']);
Route::get('/levels/{slug}', [LevelController::class, 'show']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{project}', [ProjectController::class, 'show']);
Route::get('/testimonials', [TestimonialController::class, 'index']);
Route::view('/about', 'about')->name('about');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('levels', AdminLevelController::class);
    Route::resource('classes', AdminClassController::class);
    Route::resource('methods', AdminMethodController::class);
    Route::resource('projects', AdminProjectController::class);
    Route::resource('testimonials', AdminTestimonialController::class);
});

require __DIR__.'/auth.php';
