<?php

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

Route::get('/', function () { return view('home'); });
Route::get('/listings', function () { return view('listings'); });
Route::get('/tour', function () { return view('tour'); });
Route::get('/galleries', function () { return view('galeri'); });
Route::get('/testimonials', function () { return view('testimonial'); });
Route::get('/articles', function () { return view('article'); });

