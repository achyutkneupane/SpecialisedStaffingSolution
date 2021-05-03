<?php

use App\Http\Controllers\Controller;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Setting;
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

Route::get('/', Dashboard::class)->name('home')->middleware('auth');
Route::get('/login', Login::class)->name('login')->middleware('guest');
Route::get('/register', Register::class)->name('register')->middleware('guest');
Route::get('/logout', [Controller::class,'logout'])->name('logout')->middleware('auth');
Route::get('/profile', Profile::class)->name('profile')->middleware('auth');
Route::get('/setting', Setting::class)->name('setting')->middleware('auth');