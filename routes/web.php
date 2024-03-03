<?php

use App\Http\Controllers\UserProfileController;
use App\Livewire\Pages\Index;
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

Route::view('/', 'pages/index');
Route::view('/login', 'pages/auth/login')->name('login');
Route::view('/register', 'pages/auth/register')->name('register');

Route::middleware(['auth:web'])->group(function () {
    Route::get('profile/{username}', [UserProfileController::class, 'index'])->name('profile');
});
