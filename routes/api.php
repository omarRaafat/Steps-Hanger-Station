<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
URL::forceScheme('https');
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::middleware('tenant')->group(function () {
    Route::get('/settings', 'SettingController@index');
    Route::get('/benifits', 'SettingController@getBenifits');
    Route::get('/whySteps', 'SettingController@getWhySteps');
//    Route::get('/packages', 'SettingController@getPackages');
    Route::get('/services/{id}', 'SettingController@getPackageServices');
    Route::get('/faq', 'SettingController@getFAQs');
    Route::post('/storeContactUs', 'SettingController@storeContactUs');
    Route::post('/storeNewsLetters', 'SettingController@storNewsLetters');
    Route::get('/package/{id}', 'SettingController@getPackage');
    Route::get('/servicesWithPackages', 'SettingController@getServicesFromPackage');
    Route::get('/extraPackages', 'SettingController@getExtraPackages');
    Route::post('/storeSubscripes', 'SettingController@storeSubscriptions');
    Route::get('/sub_services', 'SettingController@getSubServices');
    Route::get('/sections', 'SettingController@getSections');
    Route::get('/terms', 'SettingController@getTerms');
    Route::get('/policies', 'SettingController@getPolicies');

    Route::get('/getServices', 'SettingController@getPackageWithServices');

//});
