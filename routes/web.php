<?php

use App\Models\book;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return Inertia::render('Welcome');});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 要加controller 
Route::get('/lesson-management', function () {
    return Inertia::render('LessonManagement');
})->middleware(['auth', 'verified'])->name('dashboard_2');

Route::get('/lesson-add', function () {
    return Inertia::render('LessonAdd');
})->middleware(['auth', 'verified'])->name('lessonAdd');

// 編輯課程
Route::get('/lesson-edit', function () {
    return Inertia::render('EditLesson');
})->middleware(['auth', 'verified'])->name('lessonEdit');

// 老師管理
Route::get('/teacher-management', function () {
    return Inertia::render('TeacherManagement');
})->middleware(['auth', 'verified'])->name('TeacherManagement');

// 新增教師
Route::get('/teacher-add', function () {
    return Inertia::render('TeacherAdd');
})->middleware(['auth', 'verified'])->name('teacherAdd');

// 編輯教師
Route::get('/teacher-edit', function () {
    return Inertia::render('EditTeacher');
})->middleware(['auth', 'verified'])->name('teacherEdit');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
