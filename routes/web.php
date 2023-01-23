<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DasboardBlogController;
use App\Http\Controllers\DashboardCityController;
use App\Http\Controllers\DashboardWisataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Models\City;
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

// Route::get('/', function () {
//     return view('welcome', [
//         'title' => 'Home',
//         'cities' => City::all(),
//     ]);
// });
Route::get('/', [LandingController::class, 'index']);

// wisata
Route::get('/top-destination', [WisataController::class, 'index']);
Route::get('/top-destination/{wisata:slug}', [WisataController::class, 'show']);
// kota
Route::get('/city', [CityController::class, 'index']);
Route::get('/city/{city:slug}', [CityController::class, 'show']);
// blog
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/{blog:slug}', [BlogController::class, 'show']);
// about us
Route::get('/about-us', function () {
    return view('about-us.index', [
        'title' => 'About Us',
    ]);
});

// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard',
    ]);
})->middleware('auth');

// dashboard wisata
Route::get('/dashboard/wisata/checkSlug', [DashboardWisataController::class, 'checkSlug'])->middleware('is_admin');
Route::resource('/dashboard/wisata', DashboardWisataController::class)->middleware('is_admin');

// dashboard blog
Route::get('/dashboard/blog/checkSlug', [DasboardBlogController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/blog', DasboardBlogController::class)->middleware('auth');

// dashboard city
Route::get('/dashboard/city/checkSlug', [DashboardCityController::class, 'checkSlug'])->middleware('is_admin');
Route::resource('/dashboard/city', DashboardCityController::class)->except('show')->middleware('is_admin');

