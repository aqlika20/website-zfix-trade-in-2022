<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\BackWeb\Setting\UserManagement;
use App\BackWeb\MesinCuciPrice;

use App\BackWeb\SellMesinCuci; 
use DB;
use App\BackWeb\Partner\Partner;
use App\BackWeb\Partner\Voucher;
use App\Helper;
use App\BackWeb\Setting\Notification;

class SellingMesinCuciController extends Controller
{
    public function index(){
        
        $data = MesinCuciPrice::all(); 
         
        return response()->json(['data' => $data], 200);
    }

    public function getDetail(Request $request){
        if(Auth::check()){
        $data = $request->all();
        $validator = Validator::make($data, [
            'brand' => 'required',
            'type' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Mohon mengisi data wajib!'], 400);
        }

        $mesin_cucis = MesinCuciPrice::where([
            ['brand', '=', $data['brand']],
            ['type', '=', $data['type']],
        ])->first();

        $price = $mesin_cucis->priceGradeA;

        
        return response()->json(['data' => $price], 200);
    }
}

public function getBrand(){
    $brands = DB::table('mesin_cuci_price')->select(
        'brand'
    )->distinct()->get();

    $types = DB::table('mesin_cuci_price')->select(
        'type'
    )->distinct()->get();

    $data = [
        'brand' => $brands,
        'type' => $types
    ];

    return response()->json(['data' => $data], 200);

    }

    public function sellingMesinCuci(Request $request) {
    if(Auth::check()){

        $user = UserManagement::where('id', Auth::id())->first();

        $input = $request->all();

        $validator = Validator::make($input, [
            'brand' => 'required',
            'type' => 'required',
            'condition' => 'required',
            'kondisi_fisik' => 'required',
            'rubber' => 'required',
            'tutup' => 'required',
            'tombol' => 'required',
            'pembuangan' => 'required',
            'pengering' => 'required',
            'air_otomatis' => 'required',
            'pemanas' => 'required',
            'price' => 'required',
            'lokasi_trade' => 'required',

        ]);

        if($validator->fails()){
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        $sells = SellMesinCuci::create([
            'brand' => $input['brand'],
            'type' => $input['type'],
            'condition' => $input['condition'],
            'kondisi_fisik' => $input['kondisi_fisik'],
            'rubber' => $input['rubber'],
            'tutup' => $input['tutup'],
            'tombol' => $input['tombol'],
            'pembuangan' => $input['pembuangan'],
            'pengering' => $input['pengering'],
            'air_otomatis' => $input['air_otomatis'],
            'pemanas' => $input['pemanas'],
            'price' => $input['price'],
            'lokasi_trade' => $input['lokasi_trade'],
            'status' => 1,
            'jenis_layanan' => 6,
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
