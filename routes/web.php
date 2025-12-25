<?php

use App\Http\Controllers\Admin\AdminAlbumController;
use App\Http\Controllers\Admin\AdminClassController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminEventRegistrationController;
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
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicRegistrationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventRegistrationController;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/levels', [LevelController::class, 'index']);
Route::get('/levels/{level}', [LevelController::class, 'show']);
Route::get('/projects', [ProjectController::class, 'getprojects']);
Route::get('/projects/{project}', [ProjectController::class, 'show']);
Route::get('/testimonials', [TestimonialController::class, 'index']);
Route::view('/about', 'about')->name('about');
Route::get('/gallery', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/gallery/{id}', [AlbumController::class, 'show'])->name('albums.show');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/events/{event}/register', [EventRegistrationController::class, 'store'])->name('events.register');

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
    Route::resource('events', AdminEventController::class);
    Route::resource('event_registrations', AdminEventRegistrationController::class)->only(['index', 'show', 'destroy']);
});

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Sync projects from API into DB
    Route::post('projects/sync', [ProjectController::class, 'syncFromApi'])->name('projects.sync');
    Route::patch('projects/{project}/toggle-featured', [AdminProjectController::class, 'toggleFeatured'])->name('projects.toggleFeatured');
    Route::patch('projects/{project}/toggle-active', [AdminProjectController::class, 'toggleActive'])->name('projects.toggleActive');
});

Route::get('/register-trial', [PublicRegistrationController::class, 'show'])->name('registertrial');

Route::post('/register-class', [PublicRegistrationController::class, 'store'])
    ->name('public.register-class');

Route::get('/payment', [PaymentController::class, 'payment']);
Route::post('/midtrans/notification', [EventController::class, 'midtransNotification']);
    
require __DIR__.'/auth.php';