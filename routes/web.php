<?php

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

Route::get('/', 'PagesController@index')->name('index');
Route::get('/home', 'PagesController@index')->name('home');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');


Auth::routes(['register' => false]);


Route::prefix('/managements')->group(function(){
    Route::prefix('/sites')->group(function(){
        Route::get('/', 'Content\Management\SiteController@index')->name('managements.sites.index');
        Route::post('/add', 'Content\Management\SiteController@store')->name('managements.sites.store');
    });

    Route::prefix('/locations')->group(function(){
        Route::get('/', 'Content\Management\LocationController@index')->name('managements.locations.index');
        Route::post('/add', 'Content\Management\LocationController@store')->name('managements.locations.store');
        Route::get('/site/{site_id}', 'Content\Management\LocationController@getLocationsBySite');
    });

    Route::prefix('/roles')->group(function(){
        Route::get('/', 'Content\Management\RoleController@index')->name('managements.roles.index');
        Route::post('/add', 'Content\Management\RoleController@store')->name('managements.roles.store');
    });
});

Route::prefix('/settings')->group(function(){
    Route::prefix('/privileges')->group(function(){
        Route::get('/', 'Content\Settings\privilege\PrivilegeController@index')->name('settings.privileges.index');
        Route::post('/add', 'Content\Settings\privilege\PrivilegeController@store')->name('settings.privileges.store');
    });
});

