<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API RoutesT
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['auth:api']], function(){
    Route::prefix('/membership')->group(function(){
        Route::post('/check/voucher', 'Api\MembershipController@checkVoucherKey');
        Route::post('/activation', 'Api\MembershipController@activation');
    });
    Route::prefix('/user')->group(function(){
        Route::get('/detail', 'Api\UserController@detail');
    });
});

Route::post('/login', 'Api\AuthController@login');
Route::post('/register', 'Api\AuthController@register');
Route::prefix('/password')->group(function(){
    Route::post('/email', 'Api\AuthController@passwordEmail');
    Route::post('/reset', 'Api\AuthController@passwordReset');
});