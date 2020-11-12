<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/affiliatedschools', function () {
    return view('frontend.affiliatedschools');
});
Route::get('/downloads', function () {
    return view('frontend.downloads');
});
Route::get('/pressrelease', function () {
    return view('frontend.pressrelease');
});
Route::get('/tenders', function () {
    return view('frontend.tenders');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});

Route::get('/dashboard', function () {
    return view('frontend.layouts.dashboard.dashboard');
})->middleware(['auth', 'verified']);
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
});

Route::get('api/subject', 'App\Http\Controllers\SubjectController@index');
Route::get('api/subject/{id}', 'App\Http\Controllers\SubjectController@show');
Route::get('api/student', 'App\Http\Controllers\StudentController@index');
Route::get('api/student/{id}', 'App\Http\Controllers\StudentController@show');
