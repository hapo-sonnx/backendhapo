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
Route::get('search', [CoursesController::class, 'search'])->name('courses.search');

Route::resource('lesson/{lesson}', LessonController::class)->only(['index']);
Route::get('courses/coursedetail/{id}/search', [LessonController::class, 'search'])->name('lesson.search');
Route::post('/addreviewlesson', [LessonController::class, 'addreviewlesson'])->name('review.lesson.store');

Route::get('/view/{file}', [DocumentController::class, 'show']);
Route::post('/learning', [DocumentController::class, 'learning']);

Route::middleware(['auth'])->group(function () {
    Route::resource('profile', UserController::class)->only(['update','show']);
    Route::get('insert/{insert}', [CoursesController::class, 'join']);
    Route::get('leave/{leave}', [CoursesController::class, 'leave']);
    Route::post('/replyreview', [ReplyReviewController::class, 'reply']);
    Route::post('/addreview', [ReviewController::class, 'addreview'])->name('review.course.store');
});
Route::group(['middleware'], function () {
    Route::get('/google-sign-in-url', [GoogleController::class, 'getGoogleSignInUrl'])->name('login_google');
    Route::get('/callback', [GoogleController::class, 'loginCallback']);
});
Route::group(['middleware'], function () {
    Route::get('/facebook-sign-in-url', [FacebookController::class, 'getFacebookSignInUrl'])->name('login_facebook');
    Route::get('callback/facebook', [FacebookController::class, 'loginfacebookCallback']);
});
Auth::routes();
