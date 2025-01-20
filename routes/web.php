<?php
  use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Cms\CategoryEventController;
use App\Http\Controllers\Cms\MetodePembayaranController;
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


// Route url
Route::get('/', 'DashboardController@dashboardAnalytics');

// Route Dashboards
Route::get('/dashboard-analytics', 'DashboardController@dashboardAnalytics');

// Route Components
Route::get('/sk-layout-2-columns', 'StaterkitController@columns_2');
Route::get('/sk-layout-fixed-navbar', 'StaterkitController@fixed_navbar');
Route::get('/sk-layout-floating-navbar', 'StaterkitController@floating_navbar');
Route::get('/sk-layout-fixed', 'StaterkitController@fixed_layout');

// acess controller
Route::get('/access-control', 'AccessController@index');
Route::get('/access-control/{roles}', 'AccessController@roles');
Route::get('/modern-admin', 'AccessController@home')->middleware('permissions:approve-post');

// Auth::routes();

// locale Route
Route::get('lang/{locale}',[LanguageController::class,'swap']);


// Category Event
Route::prefix('/category_event')->name('category_event.')->group(function () {
  Route::get('/', [CategoryEventController::class,'index'])->name('index');
  Route::get('/create', [CategoryEventController::class,'create'])->name('create');
  Route::post('/store', [CategoryEventController::class,'store'])->name('store');
  Route::get('/edit/{id}', [CategoryEventController::class,'edit'])->name('edit');
  Route::post('/edit/{id}', [CategoryEventController::class,'update'])->name('update');
  Route::delete('/delete/{id}', [CategoryEventController::class,'destroy'])->name('destroy');
});

Route::prefix('/payment_method')->name('payment_method.')->group(function () {
  Route::get('/', [MetodePembayaranController::class,'index'])->name('index');
  Route::get('/create', [MetodePembayaranController::class,'create'])->name('create');
  Route::post('/store', [MetodePembayaranController::class,'store'])->name('store');
  Route::get('/edit/{id}', [MetodePembayaranController::class,'edit'])->name('edit');
  Route::post('/edit/{id}', [MetodePembayaranController::class,'update'])->name('update');
  Route::delete('/delete/{id}', [MetodePembayaranController::class,'destroy'])->name('destroy');
});
