<?php

use App\Http\Controllers\Admin\AdminAlbumController;
use App\Http\Controllers\Admin\AdminClassController;
use App\Http\Controllers\Admin\AdminLevelController;
use App\Http\Controllers\Admin\AdminMediaController;
use App\Http\Controllers\Admin\AdminMethodController;
use App\Http\Controllers\Admin\AdminPartnerController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminRegistrationController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicRegistrationController;
use App\Http\Controllers\EventController; 

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/levels', [LevelController::class, 'index']);
Route::get('/levels/{slug}', [LevelController::class, 'show']);
Route::get('/projects', [ProjectController::class, 'getprojects']);
Route::get('/projects/{project}', [ProjectController::class, 'show']);
Route::get('/testimonials', [TestimonialController::class, 'index']);
Route::view('/about', 'about')->name('about');
Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/{id}', [AlbumController::class, 'show'])->name('albums.show');
Route::get('/events', [EventController::class, 'index'])->name('events.index'); 

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('levels', AdminLevelController::class);
    Route::resource('classes', AdminClassController::class);
    Route::resource('methods', AdminMethodController::class);
    Route::resource('projects', AdminProjectController::class);
    Route::resource('testimonials', AdminTestimonialController::class);
    Route::resource('albums', AdminAlbumController::class);
    Route::resource('media', AdminMediaController::class);
    Route::resource('partners', AdminPartnerController::class);
    Route::resource('registrations', AdminRegistrationController::class)->only(['index', 'show', 'destroy']);
});

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Sync projects from API into DB
    Route::post('projects/sync', [ProjectController::class, 'syncFromApi'])->name('projects.sync');
    Route::patch('projects/{project}/toggle-featured', [AdminProjectController::class, 'toggleFeatured'])->name('projects.toggleFeatured');
    Route::patch('projects/{project}/toggle-active', [AdminProjectController::class, 'toggleActive'])->name('projects.toggleActive');
});

Route::post('/register-class', [PublicRegistrationController::class, 'store'])
    ->name('public.register-class');

    
require __DIR__.'/auth.php';