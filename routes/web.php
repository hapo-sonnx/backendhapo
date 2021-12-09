<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\CourseUserController;

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

Route::resource('courses', CoursesController::class)->only(['index','show']);

Route::resource('lessons', LessonController::class)->only(['show']);

Route::middleware(['auth'])->group(function () {
    Route::resource('user', UserController::class)->only(['update','show']);
    Route::resource('courses.users', CourseUserController::class)->only(['store','destroy']);
    Route::post('/reply', [ReplyController::class, 'replyreview']);
    Route::post('/review/course', [ReviewController::class, 'reviewcourse'])->name('review.course');
    Route::post('/review/lesson', [ReviewController::class, 'reviewlesson'])->name('review.lesson');
    Route::post('/learn', [DocumentController::class, 'learn']);
    Route::get('/view/{file}', [DocumentController::class, 'show']);
});
Route::get('auth/google', [GoogleController::class, 'getGoogleSignInUrl'])->name('login.google');
Route::get('callback', [GoogleController::class, 'loginCallback']);
Route::get('auth/facebook', [FacebookController::class, 'getFacebookSignInUrl'])->name('login.facebook');
Route::get('auth/facebook/callback', [FacebookController::class, 'loginfacebookCallback']);
Auth::routes();
