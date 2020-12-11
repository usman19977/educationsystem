<?php

use App\Http\Controllers\Api\apiController;
use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Unauthorized Routes//
Route::post('token', [apiController::class, 'login']);
Route::post('forget', [apiController::class, 'forget']);

//Athorized Routes//
Route::group(
    ['middleware' => 'auth:sanctum'],
    function () {
        Route::get('getbanners', [apiController::class, 'getbanners']);
        Route::get('/carier-requests', [apiController::class, 'getCarierRequests']);
        Route::get('/getshifts', [apiController::class, 'getshifts']);
        Route::get('/getcriterias', [apiController::class, 'getcriterias']);
        Route::get('/getsubjects/{criteria_id}', [apiController::class, 'getcriteriasubjects']);
        Route::post('/carier-request/add', [apiController::class, 'addCarierRequest']);
        Route::get('/admitcards', [apiController::class, 'getAdmitCards']);


        Route::get('/pressreleases/all', [apiController::class, 'getAllPressReleases']);
        Route::get('/downloads/all', [apiController::class, 'getAllDownloads']);
        Route::get('/tenders/all', [apiController::class, 'getAllTenders']);
        Route::get('/schools/all', [apiController::class, 'getAllSchools']);
        Route::get('/page/{slug}', [apiController::class, 'getCorrectionPage']);
        Route::post('/subscriber', [apiController::class, 'addSubscriber']);




        Route::get('/student/details', [apiController::class, 'getStudentDetails']);
        Route::post('/logout', [apiController::class, 'logout']);
    }
);
