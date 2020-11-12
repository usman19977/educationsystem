<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.



Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' =>
    [
        config('backpack.base.web_middleware', 'web'),
        config('backpack.base.middleware_key', 'admin'),

    ],

    'namespace'  => 'App\Http\Controllers\Admin',
], function () {
    // custom admin routes
    Route::crud('carier', 'CarierCrudController');
    Route::crud('field', 'FieldCrudController');
    Route::crud('criteria', 'CriteriaCrudController');
    Route::crud('subject', 'SubjectCrudController');
    Route::crud('shift', 'ShiftCrudController');
    Route::crud('school', 'SchoolCrudController');
    Route::crud('student', 'StudentCrudController');
    Route::crud('user', 'UserCrudController');
    Route::crud('schoolmanager', 'SchoolManagerCrudController');
    Route::get('charts/requests', 'Charts\RequestsChartController@response')->name('charts.requests.index');
    Route::get('charts/comparision-entiries', 'Charts\ComparisionEntiriesChartController@response')->name('charts.comparision-entiries.index');
    Route::get('charts/pie-chart-shift-user', 'Charts\PieChartShiftUserChartController@response')->name('charts.pie-chart-shift-user.index');
    Route::get('charts/linechart-criteria-vs-user', 'Charts\LinechartCriteriaVsUserChartController@response')->name('charts.linechart-criteria-vs-user.index');
    Route::crud('request', 'RequestCrudController');
    Route::get('request/{id}/generateAdmitCard', 'RequestCrudController@generateAdmitCard');
    Route::get('request/{id}/approveAdmitCard', 'RequestCrudController@approveAdmitCard');
    Route::get('request/{id}/rejectAdmitCard', 'RequestCrudController@rejectAdmitCard');


    Route::get('admitcard/{id}/download', 'RequestCrudController@downloadAdmitCard');

    Route::crud('admitcard', 'AdmitcardCrudController');
    // Route::crud('user', 'UserCrudController');
}); // this should be the absolute last line of this file
