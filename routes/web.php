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

Route::resource('courses', CoursesController::class)->only(['index','show']);

Route::resource('lessons', LessonController::class)->only(['show']);
Route::post('lesson/review', [LessonController::class, 'addreviewlesson'])->name('review.lesson');

Route::get('/view/{file}', [DocumentController::class, 'show']);
Route::post('/learning', [DocumentController::class, 'learning']);

Route::middleware(['auth'])->group(function () {
    Route::resource('user', UserController::class)->only(['update','show']);
    Route::get('/courses/{course}/join', [CoursesController::class, 'join'])->name('courses.join');
    Route::get('/courses/{course}/leave', [CoursesController::class, 'leave'])->name('courses.leave');
    Route::post('/replyreview', [ReplyReviewController::class, 'reply']);
    Route::post('/addreview', [ReviewController::class, 'addreview'])->name('review.course');
});
Route::group(['middleware'], function () {
    Route::get('auth/google', [GoogleController::class, 'getGoogleSignInUrl'])->name('login.google');
    Route::get('auth/google/callback', [GoogleController::class, 'loginCallback']);
});
Route::group(['middleware'], function () {
    Route::get('auth/facebook', [FacebookController::class, 'getFacebookSignInUrl'])->name('login.facebook');
    Route::get('auth/facebook/callback', [FacebookController::class, 'loginfacebookCallback']);
});
Auth::routes();
