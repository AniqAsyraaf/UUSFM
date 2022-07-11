<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StadiumController;
use App\Http\Controllers\GymnasiumController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\FootballFieldController;
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

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/Feed', FeedController::class)->middleware('auth');

Route::resource('/Membership', MembershipController::class)->middleware('auth');

Route::resource('/Booking', BookingController::class)->middleware('auth');

Route::resource('/Report', ReportController::class)->middleware('auth');

Route::resource('/Session', SessionController::class)->middleware('auth');

Route::resource('/Gymnasium', GymnasiumController::class)->middleware('auth');

Route::resource('/Stadium', StadiumController::class)->middleware('auth');

Route::resource('/FootballField', FootballFieldController::class)->middleware('auth');

// Route::get('FeedC/', [FeedController::class, 'create'])->name('create');

// Route::get('FeedE/{ID}', [FeedController::class, 'edit'])->name('edit');

// Route::get('FeedD/{ID}', [FeedController::class, 'destroy'])->name('delete');
