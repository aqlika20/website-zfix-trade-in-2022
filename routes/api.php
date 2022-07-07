<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\BackWeb\TvPrice;

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


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//fungsi untuk menghilangkan . , rp di db
// Route::get('system',function(){
//     $prices =  TvPrice::all();

//     foreach($prices as $price){
//         $price->priceGradeA = str_replace("Rp", "", str_replace(".", "", $price->priceGradeA));
//         $price->priceGradeB = str_replace("Rp", "", str_replace(".", "", $price->priceGradeB));
//         $price->priceGradeC = str_replace("Rp", "", str_replace(".", "", $price->priceGradeC));
//         $price->save();
//     }
// });



Route::post('/login/customer', 'Api\AuthController@loginForCustomer');
Route::post('/login/partner', 'Api\AuthController@loginForPartner');
Route::post('/register', 'Api\AuthController@register');
Route::get('/send-email', 'Api\EmailController@Email');

// Route::group(['middleware' => ['auth:api']], function(){
Route::prefix('/device')->group(function(){
Route::group(['middleware' => ['auth:api']], function(){

    Route::get('/', 'Api\SellingController@index');
    Route::post('/detail', 'Api\SellingController@getDetail');
    Route::post('/selling-phone', 'Api\SellingController@sellingPhone');

    Route::get('/laptop', 'Api\SellingLaptopController@index');
    Route::post('/detail-laptop', 'Api\SellingLaptopController@getDetail');
    Route::post('/selling-laptop', 'Api\SellingLaptopController@sellingLaptop');
    Route::get('/brands-laptop', 'Api\SellingLaptopController@getBrand');

    Route::get('/televisi', 'Api\SellingTelevisiController@index');
    Route::post('/detail-tv', 'Api\SellingTelevisiController@getDetail');
    Route::post('/selling-tv', 'Api\SellingTelevisiController@sellingTelevisi');
    Route::get('/brands', 'Api\SellingTelevisiController@getBrand');

    Route::get('/playstation', 'Api\SellingPSController@index');
    Route::post('/detail-ps', 'Api\SellingPSController@getDetail');
    Route::post('/selling-ps', 'Api\SellingPSController@sellingPlaystation');
    Route::get('/brands-ps', 'Api\SellingPSController@getBrand');

    Route::get('/kulkas', 'Api\SellingKulkasController@index');
    Route::post('/detail-kulkas', 'Api\SellingKulkasController@getDetail');
    Route::post('/selling-kulkas', 'Api\SellingKulkasController@sellingKulkas');
    Route::get('/brands-kulkas', 'Api\SellingKulkasController@getBrand');

    Route::get('/mesin-cuci', 'Api\SellingMesinCuciController@index');
    Route::post('/detail-mesin-cuci', 'Api\SellingMesinCuciController@getDetail');
    Route::post('/selling-mesin-cuci', 'Api\SellingMesinCuciController@sellingMesinCuci');
    Route::get('/brands-mesin-cuci', 'Api\SellingMesinCuciController@getBrand');

    Route::get('/store', 'Api\SellingController@getStore');
    Route::get('/transaction', 'Api\getQRController@getDataTransaction');

    Route::get('/qrCode', 'Api\getQRController@index');
    Route::get('/dataQrCode', 'Api\getQRController@getDataQR');
    Route::post('/claims-laptop', 'Api\getQRController@claimLaptop');
    Route::post('/claims-tv', 'Api\getQRController@claimTV');
    Route::post('/claims-ps', 'Api\getQRController@claimPS');
    Route::post('/claims-hanphone', 'Api\getQRController@claimHandphone');
    Route::post('/claims-kulkas', 'Api\getQRController@claimKulkas');
    Route::post('/claims-mesin-cuci', 'Api\getQRController@claimMesinCuci');

    Route::post('/manual-qr', 'Api\getQRController@getManualDataQr');
    
    Route::get('/notification', 'Api\NotificationController@index');
    Route::get('/read-notification', 'Api\NotificationController@ReadNotif');

    });
});

Route::prefix('/user')->group(function(){
Route::group(['middleware' => ['auth:api']], function(){

    Route::get('/detail', 'Api\UserController@detail');
    Route::post('/edit', 'Api\UserController@edit');
    
    });
});