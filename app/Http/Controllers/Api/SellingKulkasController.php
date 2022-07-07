<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\BackWeb\Setting\UserManagement;
use App\BackWeb\KulkasPrice;

use App\BackWeb\SellKulkas; 
use DB;
use App\BackWeb\Partner\Partner;
use App\BackWeb\Partner\Voucher;
use App\Helper;
use App\BackWeb\Setting\Notification;

class SellingKulkasController extends Controller
{
    public function index(){
        
        $data = KulkasPrice::all(); 
         
        return response()->json(['data' => $data], 200);
    }


    public function getDetail(Request $request){
        if(Auth::check()){
        $data = $request->all();
        $validator = Validator::make($data, [
            'brand' => 'required',
            'model' => 'required',
            'type' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Mohon mengisi data wajib!'], 400);
        }

        $kulkas = KulkasPrice::where([
            ['brand', '=', $data['brand']],
            ['model', '=', $data['model']],
            ['type', '=', $data['type']],
        ])->first();

        $price = $kulkas->priceGradeA;

        
        return response()->json(['data' => $price], 200);
    }
}

public function getBrand(){
    $brands = DB::table('kulkas_price')->select(
        'brand'
    )->distinct()->get();

    $models = DB::table('kulkas_price')->select(
        'model'
    )->distinct()->get();

    $types = DB::table('kulkas_price')->select(
        'type'
    )->distinct()->get();

    $data = [
        'brand' => $brands,
        'model' => $models,
        'type' => $types
    ];

    return response()->json(['data' => $data], 200);

}

public function sellingKulkas(Request $request) {
    if(Auth::check()){

        $user = UserManagement::where('id', Auth::id())->first();

        $input = $request->all();

        $validator = Validator::make($input, [
            'brand' => 'required',
            'model' => 'required',
            'type' => 'required',
            'condition' => 'required',
            'kondisi_fisik' => 'required',
            'rubber' => 'required',
            'tutup_freezer' => 'required',
            'tray' => 'required',
            'ice_maker' => 'required',
            'price' => 'required',
            'lokasi_trade' => 'required',

        ]);

        if($validator->fails()){
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        $sells = SellKulkas::create([
            'brand' => $input['brand'],
            'model' => $input['model'],
            'type' => $input['type'],
            'condition' => $input['condition'],
            'kondisi_fisik' => $input['kondisi_fisik'],
            'rubber' => $input['rubber'],
            'tutup_freezer' => $input['tutup_freezer'],
            'tray' => $input['tray'],
            'ice_maker' => $input['ice_maker'],
            'price' => $input['price'],
            'lokasi_trade' => $input['lokasi_trade'],
            'status' => 1,
            'jenis_layanan' => 5,
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
