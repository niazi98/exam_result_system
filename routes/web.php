<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\UserPanelController;
use App\Http\Controllers\AdminPanelController;

Route::get('/', function () {
    return view('welcome');
});

// Public routes for result lookup
Route::get('/result-lookup', [UserPanelController::class, 'showResultLookup'])->name('result.lookup');
Route::post('/result-lookup', [UserPanelController::class, 'lookupResult'])->name('result.lookup.process');
Route::get('/transcript', [UserPanelController::class, 'showTranscript'])->name('transcript.show');

// User panel routes (authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserPanelController::class, 'dashboard'])->name('user.dashboard');
});

// Admin panel routes (admin only)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminPanelController::class, 'dashboard'])->name('dashboard');
    Route::get('/user-management', [AdminPanelController::class, 'userManagement'])->name('user-management');
    Route::patch('/user/{user}/role', [AdminPanelController::class, 'updateUserRole'])->name('user.role.update');
    Route::get('/statistics', [AdminPanelController::class, 'statistics'])->name('statistics');
    
    // Admin resource management
    Route::resource('students', StudentController::class);
    Route::resource('instructors', InstructorController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('exams', ExamController::class);
    Route::resource('results', ResultController::class);
});

// Legacy dashboard route (redirect based on role)
Route::get('/dashboard', function () {
    if (auth()->user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
