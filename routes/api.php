<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group( function ($router) {
    Route::get('area', 'API\AreaController@index');
    Route::get('area/count', 'API\AreaController@indexCount');
});

Route::prefix('v1')->group( function ($router) {
    Route::get('cts', 'API\CtsController@index');
    Route::get('cts/count', 'API\CtsController@indexCount');
});

Route::prefix('v1')->group( function ($router) {
    //Route::get('area', 'API\AreaController@index');
    Route::get('setup/count', 'API\SetupController@indexCount');
});

Route::prefix('v1')->group( function ($router) {
    Route::get('brnzone/search', 'API\DashboardController@brnZone');
    //Route::get('brnzone/brnprv', 'API\DashboardController@BrnPrv');
});

//Mobile
Route::prefix('m1')->group( function ($router) {
    Route::get('zone/cts', 'API\BrnzoneController@cts');
    Route::get('zone/cts/{CtsId}', 'API\BrnzoneController@ctsZone');
    Route::get('zone/area', 'API\BrnzoneController@area');
    Route::get('zone/area/{AreaId}', 'API\BrnzoneController@areaZone');
    Route::get('zone/setup', 'API\BrnzoneController@setup');
    Route::get('zone/setup/{SetupId}', 'API\BrnzoneController@SetupZone');    
});