<?php

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
    return view('welcome');
});

Auth::routes([
    'verify' => true
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth', 'employe']], function () {
    Route::get('aa/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('employe.dashboard');
    Route::get('aa/dashboardwwww', [App\Http\Controllers\HomeController::class, 'indexwww'])->name('employe.dashboardeee');
});

Route::group(['middleware' => ['auth', 'employer', 'verified']], function () {
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index2'])->name('employer.dashboard');
});
