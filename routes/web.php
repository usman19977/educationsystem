<?php

use App\Http\Controllers\About;
use App\Http\Controllers\AdmitCard;
use App\Http\Controllers\AffiliateSchool;
use App\Http\Controllers\CarierRequest;
use App\Http\Controllers\Contact;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Downloads;
use App\Http\Controllers\Home;
use App\Http\Controllers\PressRelease;
use App\Http\Controllers\Tender;
use App\Models\User;
use Doctrine\DBAL\Schema\Index;
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

Route::get('/',  [Home::class, 'index']);
Route::get('/about', [About::class, 'index']);
Route::get('/affiliatedschools', [AffiliateSchool::class, 'index']);
Route::get('/downloads', [Downloads::class, 'index']);
Route::get('/pressrelease', [PressRelease::class, 'index']);
Route::get('/tenders', [Tender::class, 'index']);
Route::get('/contact', [Contact::class, 'index']);




Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [Dashboard::class, 'index']);
    Route::get('admit-cards', [AdmitCard::class, 'index']);
    Route::get('carier-requests', [CarierRequest::class, 'index']);

    Route::get('settings', function () {
        return view('frontend.layouts.dashboard.settings');
    });
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
});

Route::get('api/subject', 'App\Http\Controllers\SubjectController@index');
Route::get('api/subject/{id}', 'App\Http\Controllers\SubjectController@show');
Route::get('api/student', 'App\Http\Controllers\StudentController@index');
Route::get('api/student/{id}', 'App\Http\Controllers\StudentController@show');
