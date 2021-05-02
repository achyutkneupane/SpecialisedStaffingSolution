<?php

use App\Http\Controllers\Controller;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\LandingPage;
use App\Http\Livewire\Login;
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

Route::get('/', LandingPage::class)->name('landing')->middleware('guest');
Route::get('/home', Dashboard::class)->name('home')->middleware('auth');
Route::get('/login', Login::class)->name('login')->middleware('guest');
Route::get('/logout', [Controller::class,'logout'])->name('logout')->middleware('auth');
