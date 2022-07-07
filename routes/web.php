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
// Route::middleware('web')->domain('trade-in.'.env('APP_URL'))->group(function() {
Route::group(['middleware' => ['auth', 'checkRole:1,4']], function() {

Route::get('/', 'DashboardController@index')->name('index');
Route::get('/counting', 'DashboardController@Counting')->name('count');
Route::get('/home', 'DashboardController@index')->name('home');    

Route::get('/phone', 'BackWeb\Admin\Content\PhoneController@index')->name('phone-trade');
Route::get('/handphone/{id}', 'BackWeb\Admin\Content\PhoneController@handphone_detail')->name('handphone-trade.detail');
Route::post('/handphone/proses/{id}', 'BackWeb\Admin\Content\PhoneController@store')->name('handphone-trade.handphone_proses');
Route::post('/handphone/update', 'BackWeb\Admin\Content\PhoneController@acceptedHP')->name('handphone-trade.handphone_update');
Route::post('/handphone/notif/{id}', 'BackWeb\Admin\Content\PhoneController@Notification')->name('handphone-notif');

Route::get('/laptop', 'BackWeb\Admin\Content\LaptopController@index')->name('laptop-trade');
Route::get('/laptop/{id}', 'BackWeb\Admin\Content\LaptopController@laptop_detail')->name('laptop-trade.detail');
Route::post('/laptop/proses/{id}', 'BackWeb\Admin\Content\LaptopController@store')->name('laptop-trade.laptop_proses');
Route::post('/laptop/update', 'BackWeb\Admin\Content\LaptopController@acceptedLaptop')->name('laptop-trade.laptop_update');
Route::post('/laptop/notif/{id}', 'BackWeb\Admin\Content\LaptopController@Notification')->name('laptop-notification');

Route::get('/Televisi', 'BackWeb\Admin\Content\TelevisiController@index')->name('tv-trade');
Route::get('/Televisi/{id}', 'BackWeb\Admin\Content\TelevisiController@televisi_detail')->name('tv-trade.detail');
Route::post('/Televisi/proses/{id}', 'BackWeb\Admin\Content\TelevisiController@store')->name('tv-trade.tv_proses');
Route::post('/Televisi/update', 'BackWeb\Admin\Content\TelevisiController@acceptedTV')->name('tv-trade.tv_update');
Route::post('/Televisi/notif/{id}', 'BackWeb\Admin\Content\TelevisiController@Notification')->name('tv-notification');

Route::get('/playstation', 'BackWeb\Admin\Content\PlaystationController@index')->name('ps-trade');
Route::get('/playstation/{id}', 'BackWeb\Admin\Content\PlaystationController@playstation_detail')->name('ps-trade.detail');
Route::post('/playstation/proses/{id}', 'BackWeb\Admin\Content\PlaystationController@store')->name('ps-trade.ps_proses');
Route::post('/playstation/update', 'BackWeb\Admin\Content\PlaystationController@acceptedPS')->name('ps-trade.ps_update');
Route::post('/playstation/notif/{id}', 'BackWeb\Admin\Content\PlaystationController@Notification')->name('ps-notification');

Route::get('/kulkas', 'BackWeb\Admin\Content\KulkasController@index')->name('kulkas-trade');
Route::get('/kulkas/{id}', 'BackWeb\Admin\Content\KulkasController@kulkas_detail')->name('kulkas-trade.detail');
Route::post('/kulkas/proses/{id}', 'BackWeb\Admin\Content\KulkasController@store')->name('kulkas-trade.kulkas_proses');
Route::post('/kulkas/update', 'BackWeb\Admin\Content\KulkasController@acceptedKulkas')->name('kulkas-trade.kulkas_update');
Route::post('/kulkas/notif/{id}', 'BackWeb\Admin\Content\KulkasController@Notification')->name('kulkas-notification');

Route::get('/mesin-cuci', 'BackWeb\Admin\Content\MesinCuciController@index')->name('mesin-cuci-trade');
Route::get('/mesin-cuci/{id}', 'BackWeb\Admin\Content\MesinCuciController@mesin_cuci_detail')->name('mesin-cuci-trade.detail');
Route::post('/mesin-cuci/proses/{id}', 'BackWeb\Admin\Content\MesinCuciController@store')->name('mesin-cuci-trade.mesin_cuci_proses');
Route::post('/mesin-cuci/update', 'BackWeb\Admin\Content\MesinCuciController@acceptedMesinCuci')->name('mesin-cuci-trade.mesin_cuci_update');
Route::post('/mesin-cuci/notif/{id}', 'BackWeb\Admin\Content\MesinCuciController@Notification')->name('mesin-cuci-notification');

Route::get('create-pdf-file-laptop/{id}', 'BackWeb\Admin\Content\LaptopController@generatePDF')->name('generate_laptop');
Route::get('create-pdf-file-laptop-picker/{id}', 'BackWeb\Admin\Content\LaptopController@generatePickerPDF')->name('generate-picker-laptop');
Route::get('create-pdf-file-laptop-partner', 'BackWeb\Admin\Content\LaptopController@generatePartnerPDF')->name('generate_laptop_partner');

Route::get('create-pdf-file-tv/{id}', 'BackWeb\Admin\Content\TelevisiController@generatePDF')->name('generate_tv');
Route::get('create-pdf-file-tv-picker/{id}', 'BackWeb\Admin\Content\TelevisiController@generatePickerPDF')->name('generate_tv-picker');
Route::get('create-pdf-file-tv-partner', 'BackWeb\Admin\Content\TelevisiController@generatePartnerPDF')->name('generate_tv_partner');

Route::get('create-pdf-file-ps/{id}', 'BackWeb\Admin\Content\PlaystationController@generatePDF')->name('generate_ps'); 
Route::get('create-pdf-file-ps-picker/{id}', 'BackWeb\Admin\Content\PlaystationController@generatePickerPDF')->name('generate_ps-picker'); 
Route::get('create-pdf-file-ps-partner', 'BackWeb\Admin\Content\PlaystationController@generatePartnerPDF')->name('generate_ps_partner');

Route::get('create-pdf-file-hp/{id}', 'BackWeb\Admin\Content\PhoneController@generatePDF')->name('generate_hp'); 
Route::get('create-pdf-file-hp-picker/{id}', 'BackWeb\Admin\Content\PhoneController@generatePickerPDF')->name('generate_hp-picker'); 
Route::get('create-pdf-file-hp-partner', 'BackWeb\Admin\Content\PhoneController@generatePartnerPDF')->name('generate_hp_partner');

Route::get('create-pdf-file-kulkas/{id}', 'BackWeb\Admin\Content\KulkasController@generatePDF')->name('generate_kulkas'); 
Route::get('create-pdf-file-kulkas-picker/{id}', 'BackWeb\Admin\Content\KulkasController@generatePickerPDF')->name('generate_kulkas-picker'); 
Route::get('create-pdf-file-kulkas-partner', 'BackWeb\Admin\Content\KulkasController@generatePartnerPDF')->name('generate_kulkas_partner');

Route::get('create-pdf-file-mesin_cuci/{id}', 'BackWeb\Admin\Content\MesinCuciController@generatePDF')->name('generate_mesin_cuci'); 
Route::get('create-pdf-file-mesin_cuci-picker/{id}', 'BackWeb\Admin\Content\MesinCuciController@generatePickerPDF')->name('generate_mesin_cuci-picker'); 
Route::get('create-pdf-file-mesin_cuci-partner', 'BackWeb\Admin\Content\MesinCuciController@generatePartnerPDF')->name('generate_mesin_cuci_partner');

Route::get('/invoice', 'BackWeb\Admin\Content\InvoiceController@index')->name('invoice');
Route::post('/invoice', 'BackWeb\Admin\Content\InvoiceController@index')->name('invoice');

Route::get('/generate-invoice', 'BackWeb\Admin\Content\InvoiceController@generateInvoice')->name('generateInvoices');


});

Route::group(['middleware' => ['auth', 'checkRole:1']], function() {
Route::prefix('/laptop-price')->group(function(){
    Route::get('/', 'BackWeb\Admin\Setting\PriceLaptopManagementController@index')->name('price_laptop');
    Route::post('/create', 'BackWeb\Admin\Setting\PriceLaptopManagementController@create')->name('create.price_laptop');
    Route::post('/import', 'BackWeb\Admin\Setting\PriceLaptopManagementController@uploadFile')->name('import.price_laptop');
    Route::get('/export', 'BackWeb\Admin\Setting\PriceLaptopManagementController@exportCsv')->name('export.price_laptop');

    });

Route::prefix('/ps-price')->group(function(){
    Route::get('/', 'BackWeb\Admin\Setting\PricePlaystationController@index')->name('price_ps');
    Route::post('/create', 'BackWeb\Admin\Setting\PricePlaystationController@create')->name('create.price_ps');
    Route::post('/import', 'BackWeb\Admin\Setting\PricePlaystationController@uploadFile')->name('import.price_ps');
    });

Route::prefix('/televisi-price')->group(function(){
    Route::get('/', 'BackWeb\Admin\Setting\PriceTelevisiController@index')->name('price_tv');
    Route::post('/create', 'BackWeb\Admin\Setting\PriceTelevisiController@create')->name('create.price_tv');
    Route::post('/import', 'BackWeb\Admin\Setting\PriceTelevisiController@uploadFile')->name('import.price_tv');
    
    });

Route::prefix('/hanphone-price')->group(function(){
    Route::get('/', 'BackWeb\Admin\Setting\PriceHandphoneController@index')->name('price_handphone');
    Route::post('/create', 'BackWeb\Admin\Setting\PriceHandphoneController@create')->name('create.price_handphone');
    Route::post('/import', 'BackWeb\Admin\Setting\PriceHandphoneController@uploadFile')->name('import.price_handphone');

    });

Route::prefix('/kulkas-price')->group(function(){
    Route::get('/', 'BackWeb\Admin\Setting\PriceKulkasController@index')->name('price_kulkas');
    Route::post('/create', 'BackWeb\Admin\Setting\PriceKulkasController@create')->name('create.price_kulkas');
    Route::post('/import', 'BackWeb\Admin\Setting\PriceKulkasController@uploadFile')->name('import.price_kulkas');
    
    });

Route::prefix('/mesin-cuci-price')->group(function(){
    Route::get('/', 'BackWeb\Admin\Setting\PriceMesinCuciController@index')->name('price_mesin_cuci');
    Route::post('/create', 'BackWeb\Admin\Setting\PriceMesinCuciController@create')->name('create.price_mesin_cuci');
    Route::post('/import', 'BackWeb\Admin\Setting\PriceMesinCuciController@uploadFile')->name('import.price_mesin_cuci');

    });

});

Route::group(['middleware' => ['auth', 'checkRole:1']], function() {
    Route::prefix('/partner')->group(function(){
        // Route::prefix('/register-new-partner')->group(function(){
            Route::get('/', 'BackWeb\Admin\Partner\PartnerController@index')->name('partner.index');
            // Route::get('/detail/{id}', 'BackWeb\Admin\Partner\PartnerController@detail')->name('register-new-partner.detail');
            Route::post('/create', 'BackWeb\Admin\Partner\PartnerController@create')->name('partner.create');
            // Route::get('/export/{id}/{status}', 'BackWeb\Admin\Partner\PartnerController@export')->name('register-new-partner.export');
            Route::get('/edit/{id}', 'BackWeb\Admin\Partner\PartnerController@view')->name('partner.view');
            Route::patch('/edit/{id}', 'BackWeb\Admin\Partner\PartnerController@edit')->name('partner.edit');
            // Route::patch('/sold/{id}', 'BackWeb\Admin\Partner\PartnerController@sold')->name('register-new-partner.sold');
            Route::delete('/delete/{id}', 'BackWeb\Admin\Partner\PartnerController@delete')->name('partner.delete');
            Route::get('/tracking/{id}', 'BackWeb\Admin\Partner\PartnerController@tracking')->name('partner.tracking');
        // });
    });

    Route::prefix('/setting')->group(function(){
        Route::prefix('/user-management')->group(function(){
            Route::get('/', 'BackWeb\Admin\Setting\UserManagementController@index')->name('user-management.index');
            Route::post('/create', 'BackWeb\Admin\Setting\UserManagementController@create')->name('user-management.create');
            Route::get('/edit/{id}', 'BackWeb\Admin\Setting\UserManagementController@view')->name('user-management.view');
            Route::patch('/edit/{id}', 'BackWeb\Admin\Setting\UserManagementController@edit')->name('user-management.edit');
            Route::delete('/delete/{id}', 'BackWeb\Admin\Setting\UserManagementController@delete')->name('user-management.delete');
        });
    });
});




Auth::routes(['register' => false]);
// Auth::routes();
// });