<?php

use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('students.index'));

Route::resource('plans', PlanController::class)->except(['show']);
Route::resource('instructors', InstructorController::class)->except(['show']);
Route::resource('students', StudentController::class)->except(['show']);
Route::resource('lessons', LessonController::class)->except(['show']);
Route::resource('enrollments', EnrollmentController::class)->except(['show']);
