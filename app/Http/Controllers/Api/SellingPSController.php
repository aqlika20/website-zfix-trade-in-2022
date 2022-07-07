<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\BackWeb\Setting\UserManagement;
use App\BackWeb\PsPrice;
use App\BackWeb\PsDetailCheck;
use App\BackWeb\SellPs; 
use DB;
use App\BackWeb\Partner\Partner;
use App\BackWeb\Partner\Voucher;
use App\Helper;
use App\BackWeb\Setting\Notification;

class SellingPSController extends Controller
{
    public function index(){
        
        $data = PsPrice::all(); 
         
        return response()->json(['data' => $data], 200);
    }


    public function getDetail(Request $request){
        if(Auth::check()){
        $data = $request->all();
        $validator = Validator::make($data, [
            'storages' => 'required',
            'type' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Mohon mengisi data wajib!'], 400);
        }

        $playstations= PsPrice::where([
            ['jenis_ps', '=', $data['jenis_ps']],
            ['storages', '=', $data['storages']],
            ['type', '=', $data['type']],
        ])->first();

        // $PsCheck = PsDetailCheck::where([
        // ['addition', '=', $data['addition']],
        // ['condition', '=', $data['condition']],
        // ])->first();

        // if($PsCheck->addition == 1 && $PsCheck->condition == 1){
            $price = $playstations->priceGradeA;
        // }
 
        // if($deviceCheck->screen_has_problem == 1 && $deviceCheck->wifi_has_problem == 0 && $deviceCheck->camera_has_problem == 0 && $deviceCheck->button_has_problem == 0 || $deviceCheck->screen_has_problem == 0 && $deviceCheck->wifi_has_problem == 1 && $deviceCheck->camera_has_problem == 0 && $deviceCheck->button_has_problem == 0 || $deviceCheck->screen_has_problem == 0 && $deviceCheck->wifi_has_problem == 0 && $deviceCheck->camera_has_problem == 1 && $deviceCheck->button_has_problem == 0 || $deviceCheck->screen_has_problem == 0 && $deviceCheck->wifi_has_problem == 0 && $deviceCheck->camera_has_problem == 0 && $deviceCheck->button_has_problem == 1){
        //     $price = $devices->priceGradeB;
        // }

        // if($deviceCheck->screen_has_problem == 1 && $deviceCheck->wifi_has_problem == 1 && $deviceCheck->camera_has_problem == 1 && $deviceCheck->button_has_problem == 1){
        //     $price = $devices->priceGradeC;
        // }
        
        return response()->json(['data' => $price], 200);
    }
}

public function getBrand(){
    $brands = DB::table('ps_price')->select(
        'brand'
    )->distinct()->get();

    $storages = DB::table('ps_price')->select(
        'storages'
    )->distinct()->get();

    $types = DB::table('ps_price')->select(
        'type'
    )->distinct()->get();

    $jenis_pss = DB::table('ps_price')->select(
        'jenis_ps'
    )->distinct()->get();

    $data = [
        'brand' => $brands,
        'storages' => $storages,
        'type' => $types,
        'jenis_ps' => $jenis_pss

    ];

    return response()->json(['data' => $data], 200);

}

public function sellingPlaystation(Request $request) {
    if(Auth::check()){

        $user = UserManagement::where('id', Auth::id())->first();

        $input = $request->all();

        $validator = Validator::make($input, [
            'storages' => 'required',
            'addition' => 'required',
            'condition' => 'required',
            'type' => 'required|string'

        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Invalid Data!'], 400);
        }

        $sells = SellPs::create([
            'jenis_ps' => $input['jenis_ps'],
            'storages' => $input['storages'],
            'addition' => $input['addition'],
            'condition' => $input['condition'],
            'price' => $input['price'],
            'lokasi_trade' => $input['lokasi_trade'],
            'type' => $input['type'],
            'kondisi_ps' => $input['kondisi_ps'],
            'console' => $input['console'],
            'port' => $input['port'],
            'add_games' => $input['add_games'],
            'jenis_layanan' => 4,
            'status' => 1,
            'customers_id' => $user->id,
            'created_at' =>  Carbon::now()
        ]);
                
        $sells->save();

        $notif = Notification::create([
            'customers_id' => $user->id,
            'title' => "inspeksi",
            'type' => "Kulkas Trade In",
            'description' => "Selamat, data yang anda submit telah diterima oleh CS kami, CS akan segera menghubungi kamu untuk konfirmasi data, Terima Kasih", 
            'read' => 0,
        ]);

        $notif->save();
       
        return response()->json(['success'], 201);
    }
}

}
