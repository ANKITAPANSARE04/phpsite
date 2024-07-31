<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// http://api.ishsmumbai.in/login/?cdcno=BY68298&spin=1111
//  
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [HomeController::class, 'showRegisterForm'])->name('showRegisterForm');
Route::post('/register-done', [HomeController::class, 'registerDone'])->name('registerdone');
 
Route::get('/login', [HomeController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [HomeController::class, 'login'])->name('login');
Route::get('/user-details', [HomeController::class, 'showUserDetails'])->name('userdetails'); 
// Route::get('/userdetails', [HomeController::class, 'userDetails'])->name('userdetails');

Route::get('/validate-cdc', [HomeController::class, 'showValidateForm'])->name('showValidateForm');
Route::post('/validate-cdc', [HomeController::class, 'validateCdc'])->name('validateCdc');
 

Route::get('/change-pin', [HomeController::class, 'showChangePinForm'])->name('showChangePinForm');
Route::post('/change-pin', [HomeController::class, 'changePin'])->name('changePin');

// use App\Http\Controllers\RegisterController;

// Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
