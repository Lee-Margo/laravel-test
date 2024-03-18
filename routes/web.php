<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\LessonController;
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



Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // 老師管理
    Route::get('/teacher-management', function () {
        return Inertia::render('TeacherManagement');
    })->name('TeacherManagement');

    // 新增教師
    Route::get('/teacher-add', function () {
        return Inertia::render('TeacherAdd');
    })->name('teacherAdd');

    // 編輯教師
    Route::get('/teacher-edit', function () {
        return Inertia::render('EditTeacher');
    })->name('teacherEdit');

    // 學期課表總覽
    Route::get('/semester-management', function () {
        return Inertia::render('SemesterManagement');
    })->name('semesterManagement');

    // 學期課表新增
    Route::get('/semester-add', function () {
        return Inertia::render('SemesterAdd');
    })->name('semesterAdd');

    // 學期課表更改
    Route::get('/semester-edit', function () {
        return Inertia::render('EditSemester');
    })->name('semesterEdit');
});



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/lesson-management', [LessonController::class,'index'])
    ->name('dashboard_2');

    Route::get('/lesson-add', function () {
        return Inertia::render('LessonAdd');
    })->name('lessonAdd');
    
    Route::get('/lesson-edit', function () {
        return Inertia::render('EditLesson');
    })->name('lessonEdit');

    // 增加課程的
    Route::post('/lesson-1', [LessonController::class, 'addLesson']);

    Route::get('/lesson-edit', [LessonController::class, 'bringEditData']);
    
    Route::post('/lesson-edit-2', [LessonController::class, 'replaceEditData']);

});











Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
