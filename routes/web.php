<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('home');
});

Route::get('/user_id', function () {
    return response()->json(['user_id' => auth()->id()]);
});

Route::get('/session-data', function () {
    return response()->json(auth()->user());
});

Route::get('/account', function () {
    return view('home');
});

Route::get('/notifications', function () {
    return view('home');
});

Route::get('/notification/create', function () {
    return view('home');
});

Route::get('/users', function () {
    return view('home');
});

Route::get('/notification/dashboard', function () {
    return view('home');
});

require __DIR__.'/auth.php';
