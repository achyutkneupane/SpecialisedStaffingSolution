<?php

use App\Http\Controllers\Controller;
use App\Http\Livewire\AllCustomer;
use App\Http\Livewire\AllEmployee;
use App\Http\Livewire\AllInvoices;
use App\Http\Livewire\AllJobs;
use App\Http\Livewire\AllNotification;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\LandingPage;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use App\Http\Livewire\Profile;
use App\Http\Livewire\ScheduleJob;
use App\Http\Livewire\Setting;
use App\Http\Livewire\ViewCustomer;
use App\Http\Livewire\ViewEmployee;
use App\Http\Livewire\ViewInvoice;
use App\Http\Livewire\ViewJob;
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

Route::get('/',LandingPage::class)->name('landingPage')->middleware('guest');
Route::get('/home', Dashboard::class)->name('home')->middleware('auth');
Route::get('/all/employee', AllEmployee::class)->name('allEmployee')->middleware('auth','checkIfManager');
Route::get('/all/customer', AllCustomer::class)->name('allCustomer')->middleware('auth','checkIfManager');
Route::get('/login', Login::class)->name('login')->middleware('guest');
Route::get('/register', Register::class)->name('register')->middleware('guest');
Route::get('/logout', [Controller::class,'logout'])->name('logout')->middleware('auth');
Route::get('/profile', Profile::class)->name('profile')->middleware('auth');
Route::get('/notification', AllNotification::class)->name('notification')->middleware('auth');
Route::get('/setting', Setting::class)->name('setting')->middleware('auth');
Route::get('/jobs', AllJobs::class)->name('allJobs')->middleware('auth');
Route::get('/invoices', AllInvoices::class)->name('allInvoices')->middleware('auth');
Route::get('/jobs/schedule', ScheduleJob::class)->name('scheduleJob')->middleware('auth');
Route::get('/job/{id}', ViewJob::class)->name('viewJob')->middleware('auth');
Route::get('/job/{id}/invoice', ViewInvoice::class)->name('viewInvoice')->middleware('auth');
Route::get('/employee/{id}', ViewEmployee::class)->name('viewEmployee')->middleware('auth','checkIfManager');
Route::get('/customer/{id}', ViewCustomer::class)->name('viewCustomer')->middleware('auth','checkIfManager');