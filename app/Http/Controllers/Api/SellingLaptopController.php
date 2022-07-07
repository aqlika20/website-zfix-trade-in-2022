<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BackWeb\LaptopPrice;
use App\BackWeb\LaptopDetailCheck;
use App\BackWeb\SellLaptop;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\BackWeb\Setting\UserManagement;
use App\BackWeb\Partner\Partner;
use App\BackWeb\Partner\Voucher;
use App\Helper;
use DB;
use App\BackWeb\Setting\Notification;


class SellingLaptopController extends Controller
{
    public function index(){
        
        $data = LaptopPrice::all(); 
         
        return response()->json(['data' => $data], 200);
    }

    public function getBrand(){
        $brands = DB::table('laptop_price')->select(
            'brand'
        )->distinct()->get();
    
        $storages = DB::table('laptop_price')->select(
            'storages'
        )->distinct()->get();
    
        $memorys = DB::table('laptop_price')->select(
            'memory'
        )->distinct()->get();

        $processors = DB::table('laptop_price')->select(
            'processor'
        )->distinct()->get();
    
        $data = [
            'brand' => $brands,
            'storages' => $storages,
            'memory' => $memorys,
            'processor'=> $processors
        ];
    
        return response()->json(['data' => $data], 200);
    
    }


    public function getDetail(Request $request){
        if(Auth::check()){
        $data = $request->all();
        $validator = Validator::make($data, [
            'brand' => 'required',
            'memory' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Mohon mengisi data wajib!'], 400);
        }

        $laptops = LaptopPrice::where([
            ['brand', '=', $data['brand']],
            ['memory', '=', $data['memory']],
            ['jenis_storage', '=', $data['jenis_storage']],
            ['os', '=', $data['os']],
            ['ukuran_laptop', '=', $data['ukuran_laptop']],
            ['processor', '=', $data['processor']],

        ])->first();

            $price = $laptops->priceGradeA;
        
        return response()->json(['data' => $price], 200);
    }
}

public function sellingLaptop(Request $request) {
    if(Auth::check()){

        $user = UserManagement::where('id', Auth::id())->first();

        $input = $request->all();

        $validator = Validator::make($input, [
            // 'brand' => 'required',
            // 'memory' => 'required',
            // 'storages' => 'required',
            // 'inner_screen' => 'required',
            // 'outer_screen' => 'required',
            // 'addition' => 'required',
            // 'condition' => 'required',
            // 'price' => 'required|string',
            // 'lokasi_trade' => 'required',

        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Invalid Data!'], 400);
        }

        $sells = SellLaptop::create([
            'brand' => $input['brand'],
            'memory' => $input['memory'],
            // 'storages' => $input['storages'],
            // 'inner_screen' => $input['inner_screen'],
            'outer_screen' => $input['outer_screen'],
            'addition' => $input['addition'],
            'condition' => $input['condition'],
            'price' => $input['price'],
            'lokasi_trade' => $input['lokasi_trade'],
            'jenis_storage' => $input['jenis_storage'],
            'kondisi_laptop' => $input['kondisi_laptop'],
            'jenis_layar' => $input['jenis_layar'],
            'baterai' => $input['baterai'],
            'kondisi_layar' => $input['kondisi_layar'],
            'keyboard' => $input['keyboard'],
            'trackpad' => $input['trackpad'],
            'port' => $input['port'],
            'wifi' => $input['wifi'],
            // 'camera' => $input['camera'],
            'speaker' => $input['speaker'],
            'processor' => $input['processor'],
            'ukuran_laptop' => $input['ukuran_laptop'],
            'os' => $input['os'],
            // 'more_addition' => $input['more_addition'],

            'jenis_layanan' => 2,
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
