<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\FlyerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return redirect()->route('home');
});
Route::get('/app.css', function () {
    $theme = config('al.theme'); // Memuat konfigurasi tema
    return response()
        ->view('styles.app', ['theme' => $theme])
        ->header('Content-Type', 'text/css');
});
// -------------- Auth Routes ----------------
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('/password/confirm', [ConfirmPasswordController::class, 'confirm']);
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
//Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//Route::post('/register', [RegisterController::class, 'register']);

//Auth::routes();
// -------------- End Auth Routes ----------------

// -------------- Unauthenticated routes ------------------
Route::get('/status/{id}', [FlyerController::class, 'status'])->name('flyer.status');

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/flyer',[FlyerController::class, 'index'])->name('flyer.index');
    Route::get('/flyer/add',[FlyerController::class, 'add'])->name('flyer.add');
    Route::post('/flyer/store',[FlyerController::class, 'store'])->name('flyer.store');
    Route::get('/flyer/{id}/edit',[FlyerController::class, 'edit'])->name('flyer.edit');
    Route::post('/flyer/{id}/update',[FlyerController::class, 'update'])->name('flyer.update');
    Route::post('/flyer/{id}/seat',[FlyerController::class, 'seat'])->name('flyer.seat');
    Route::delete('/flyer/{id}/destroy',[FlyerController::class, 'destroy'])->name('flyer.destroy');
    Route::get('/flyer/{id}/qr-logo', [FlyerController::class, 'qrWithLogo'])->name('flyer.qrlogo');

    Route::middleware(['role:admin|developer'])->group(function (){
        Route::get('/user',[UserController::class, 'index'])->name('user.index');
        Route::get('/user/add',[UserController::class, 'add'])->name('user.add');
        Route::post('/user/store',[UserController::class, 'store'])->name('user.store');
        Route::get('/user/{id}/edit',[UserController::class, 'edit'])->name('user.edit');
        Route::post('/user/{id}/update',[UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{id}/destroy',[UserController::class, 'destroy'])->name('user.destroy');
    });
});