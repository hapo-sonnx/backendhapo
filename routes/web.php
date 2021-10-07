<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;

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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('allcourses', [CoursesController::class, 'index'])->name('courses');
Route::get('search', [CoursesController::class, 'search'])->name('search');
Route::get('allcourses/coursedetail/{id}', [CoursesController::class, 'detail'])->name('courses.detail');
Route::get('allcourses/coursedetail/{id}/search', [LessonController::class, 'search'])->name('filterdetail');
Route::get('insert/{id}', [CoursesController::class, 'join'])->middleware('login');
Route::get('leave/{id}', [CoursesController::class, 'leave'])->middleware('login');
Route::get('allcourses/coursedetail/lesson/{id}', [LessonController::class, 'index']);
Route::get('/view/{file}', [DocumentController::class, 'show']);
Route::post('/learning', [DocumentController::class, 'learning']);
Route::get('/profile', [UserController::class, 'index'])->middleware('login');
Route::post('/profile/edit', [UserController::class, 'update'])->middleware('login');
Route::post('/addreview', [CoursesController::class, 'addreview'])->name('review.course.store');
Auth::routes();
