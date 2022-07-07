<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\BackWeb\Setting\UserManagement;
use App\BackWeb\TvPrice;
use App\BackWeb\TvDetailCheck;
use App\BackWeb\SellTv; 
use DB;
use App\BackWeb\Partner\Partner;
use App\BackWeb\Partner\Voucher;
use App\Helper;
use App\BackWeb\Setting\Notification;

class SellingTelevisiController extends Controller
{
    public function index(){
        
        $data = TvPrice::all(); 
         
        return response()->json(['data' => $data], 200);
    }


    public function getDetail(Request $request){
        if(Auth::check()){
        $data = $request->all();
        $validator = Validator::make($data, [
            'brand' => 'required',
            'jenis_tv' => 'required',
            'inner_screen' => 'required',
            'outer_screen' => 'required',
            'addition' => 'required',
            'condition' => 'required',
            'inch' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Mohon mengisi data wajib!'], 400);
        }

        $televisis = TvPrice::where([
            ['brand', '=', $data['brand']],
            ['jenis_tv', '=', $data['jenis_tv']],
            ['inch', '=', $data['inch']],
        ])->first();

        $price = $televisis->priceGradeA;

        
        return response()->json(['data' => $price], 200);
    }
}

public function getBrand(){
    $brands = DB::table('tv_price')->select(
        'brand'
    )->distinct()->get();

    $ukurans = DB::table('tv_price')->select(
        'inch'
    )->distinct()->get();

    $jenis = DB::table('tv_price')->select(
        'jenis_tv'
    )->distinct()->get();

    $data = [
        'brand' => $brands,
        'inch' => $ukurans,
        'jenis_tv' => $jenis
    ];

    return response()->json(['data' => $data], 200);

}

public function sellingTelevisi(Request $request) {
    if(Auth::check()){

        $user = UserManagement::where('id', Auth::id())->first();

        $input = $request->all();

        $validator = Validator::make($input, [
            'brand' => 'required',
            'jenis' => 'required',
            'inner_screen' => 'required',
            'outer_screen' => 'required',
            'addition' => 'required',
            'condition' => 'required',
            'price' => 'required',
            'inch' => 'required',
            'lokasi_trade' => 'required',

        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Invalid Data!'], 400);
        }

        // if ($input['jenis_tv'] == "LED") {
        //     $sells = SellTv::create([
        //         'brand' => $input['brand'],
        //         'jenis_tv' => $input['jenis'],
        //         'inner_screen' => $input['inner_screen'],
        //         'outer_screen' => $input['outer_screen'],
        //         'addition' => $input['addition'],
        //         'condition' => $input['condition'],
        //         'price' => $input['price'],
        //         'lokasi_trade' => $input['lokasi_trade'],
        //         'inch' => $input['inch'],
        //         'suara' => $input['suara'],
        //         // 'port' => $input['port'],
        //         'kondisi_tv' => $input['kondisi_tv'],
        //         'kondisi_layar' => $input['kondisi_layar'],
        //         'status' => 1,
        //         'jenis_layanan' => 3,
        //         'customers_id' => $user->id,
        //         'created_at' =>  Carbon::now()
        //     ]);
    
        //     $sells->save();
        //     return response()->json(['success'], 201);

        // } else {

        $sells = SellTv::create([
            'brand' => $input['brand'],
            'jenis_tv' => $input['jenis'],
            'inner_screen' => $input['inner_screen'],
            'outer_screen' => $input['outer_screen'],
            'addition' => $input['addition'],
            'condition' => $input['condition'],
            'price' => $input['price'],
            'lokasi_trade' => $input['lokasi_trade'],
            'inch' => $input['inch'],
            'suara' => $input['suara'],
            // 'wifi' => $input['wifi'],
            // 'port' => $input['port'],
            'kondisi_tv' => $input['kondisi_tv'],
            'kondisi_layar' => $input['kondisi_layar'],
            'status' => 1,
            'jenis_layanan' => 3,
            'customers_id' => $user->id,
            'created_at' =>  Carbon::now()
        ]);

        $sells->save();

        $notif = Notification::create([
            'customers_id' => $user->id,
            'title' => "inspeksi",
            'type' => "Televisi Trade In",
            'description' => "Selamat, data yang anda submit telah diterima oleh CS kami, CS akan segera menghubungi kamu untuk konfirmasi data, Terima Kasih", 
            'read' => 0,
        ]);

        $notif->save();
        
        return response()->json(['success'], 201);

        }
            // return response()->json(['success'], 201);
        }
    // }
}
