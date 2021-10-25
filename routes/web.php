<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReplyReviewController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;

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
Route::get('courses', [CoursesController::class, 'index'])->name('courses');
Route::get('search', [CoursesController::class, 'search'])->name('search');
Route::get('courses/coursedetail/{id}', [CoursesController::class, 'detail'])->name('coursesdetail');
Route::get('courses/coursedetail/{id}/search', [LessonController::class, 'search'])->name('filterdetail');
Route::get('insert/{id}', [CoursesController::class, 'join'])->middleware('login');
Route::get('leave/{id}', [CoursesController::class, 'leave'])->middleware('login');
Route::get('courses/coursedetail/lesson/{id}', [LessonController::class, 'index']);
Route::get('/view/{file}', [DocumentController::class, 'show']);
Route::post('/learning', [DocumentController::class, 'learning']);
Route::get('/profile', [UserController::class, 'index'])->middleware('login');
Route::post('/profile/edit', [UserController::class, 'update'])->middleware('login');
Route::post('/addreview', [CoursesController::class, 'addreview'])->name('review.course.store');
Route::post('/addreviewlesson', [LessonController::class, 'addreviewlesson'])->name('review.lesson.store');
Route::post('/replyreview', [ReplyReviewController::class, 'reply'])->middleware('login');
Route::group(['middleware'], function () {
    Route::get('/google-sign-in-url', [GoogleController::class, 'getGoogleSignInUrl'])->name('login_google');
    Route::get('/callback', [GoogleController::class, 'loginCallback']);
});
Route::group(['middleware'], function () {
    Route::get('/facebook-sign-in-url', [FacebookController::class, 'getFacebookSignInUrl'])->name('login_facebook');
    Route::get('callback/facebook', [FacebookController::class, 'loginfacebookCallback']);
});
Auth::routes();
