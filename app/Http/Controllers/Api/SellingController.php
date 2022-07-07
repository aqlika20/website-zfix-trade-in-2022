<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BackWeb\Device;
use App\BackWeb\SellPhone; 
use App\BackWeb\DeviceCheck;
use App\BackWeb\DeviceDetailCheck;
use App\BackWeb\LaptopCheck;
use App\BackWeb\Partner\Partner;
use App\BackWeb\TelevisiCheck;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\BackWeb\Setting\UserManagement;
use App\BackWeb\Setting\Notification;

class SellingController extends Controller
{
    public function index(){
        
        $data = Device::all(); 
         
        return response()->json(['data' => $data], 200);
    }

    public function getDetail(Request $request){
        if(Auth::check()){
        $data = $request->all();
        $validator = Validator::make($data, [
            'brand' => 'required',
            'ram' => 'required',
            'storages' => 'required',
            'screen_has_problem' => 'required',
            'wifi_has_problem' => 'required',
            'camera_has_problem' => 'required',
            'button_has_problem' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Mohon mengisi data wajib!'], 400);
        }

        $devices = Device::where([
            ['brand', '=', $data['brand']],
            ['ram', '=', $data['ram']],
            ['storages', '=', $data['storages']]
        ])->first();

        $deviceCheck = DeviceDetailCheck::where([
        ['screen_has_problem', '=', $data['screen_has_problem']],
        ['wifi_has_problem', '=', $data['wifi_has_problem']],
        ['camera_has_problem', '=', $data['camera_has_problem']],
        ['button_has_problem', '=', $data['button_has_problem']],
        ])->first();

        if($deviceCheck->screen_has_problem == 0 && $deviceCheck->wifi_has_problem == 0 && $deviceCheck->camera_has_problem == 0 && $deviceCheck->button_has_problem == 0){
            $price = $devices->priceGradeA;
        }
 
        if($deviceCheck->screen_has_problem == 1 && $deviceCheck->wifi_has_problem == 0 && $deviceCheck->camera_has_problem == 0 && $deviceCheck->button_has_problem == 0 || $deviceCheck->screen_has_problem == 0 && $deviceCheck->wifi_has_problem == 1 && $deviceCheck->camera_has_problem == 0 && $deviceCheck->button_has_problem == 0 || $deviceCheck->screen_has_problem == 0 && $deviceCheck->wifi_has_problem == 0 && $deviceCheck->camera_has_problem == 1 && $deviceCheck->button_has_problem == 0 || $deviceCheck->screen_has_problem == 0 && $deviceCheck->wifi_has_problem == 0 && $deviceCheck->camera_has_problem == 0 && $deviceCheck->button_has_problem == 1){
            $price = $devices->priceGradeB;
        }

        if($deviceCheck->screen_has_problem == 1 && $deviceCheck->wifi_has_problem == 1 && $deviceCheck->camera_has_problem == 1 && $deviceCheck->button_has_problem == 1){
            $price = $devices->priceGradeC;
        }
        
        return response()->json(['data' => $price], 200);
    }
}

    public function sellingPhone(Request $request) {
        if(Auth::check()){

            $user = UserManagement::where('id', Auth::id())->first();

            $input = $request->all();

            $validator = Validator::make($input, [
                'brand' => 'required',
                'ram' => 'required',
                'storages' => 'required',
                'screen_has_problem' => 'required|integer',
                'wifi_has_problem' => 'required|integer',
                'camera_has_problem' => 'required|integer',
                'button_has_problem' => 'required|integer',
                'price' => 'required|string',

            ]);

            if($validator->fails()){
                return response()->json([
                    'messages' => $validator->errors()
                ], 400);
            }

            $sells = SellPhone::create([
                'brand' => $input['brand'],
                'ram' => $input['ram'],
                'storages' => $input['storages'],
                'screen_has_problem' => $input['screen_has_problem'],
                'wifi_has_problem' => $input['wifi_has_problem'],
                'camera_has_problem' => $input['camera_has_problem'],
                'button_has_problem' => $input['button_has_problem'],
                'finger' => $input['finger'],
                'vibration' => $input['vibration'],
                'lokasi_trade' => $input['lokasi_trade'],
                'price' => $input['price'],
                'jenis_layanan' => 1,
                'customers_id' => $user->id,
                'created_at' =>  Carbon::now()
            ]);
            

            $sells->save();

            $notif = Notification::create([
                'customers_id' => $user->id,
                'title' => "inspeksi",
                'type' => "Kulkas Selling",
                'description' => "Selamat, data yang anda submit telah diterima oleh CS kami, CS akan segera menghubungi kamu untuk konfirmasi data, Terima Kasih", 
                'read' => 0,
            ]);
    
            $notif->save();

                // $deviceCheck = DeviceCheck::create([
                //     'process_id' => $sells->id,
                //     'screen_has_problem' => $input['screen_has_problem'],
                //     'wifi_has_problem' => $input['wifi_has_problem'],
                //     'camera_has_problem' => $input['camera_has_problem'],
                //     'button_has_problem' => $input['button_has_problem'],
                //     'price' => $input['price'],
                // ]);
                // $deviceCheck->save();
           
            return response()->json(['success'], 201);
        }
    }

    public function getStore() { 
            
        $store = Partner::all();
        // dd($store);
        $data = [
            'store' => $store,
        ];

        return response()->json(['data' => $data], 200);
        
    }

    // public function sellingLaptop(Request $request) {
    //     // if(Auth::check()){

    //         // $customer = CustomerManagement::where('users_id', Auth::id())->first();

    //         $input = $request->all();

    //         $validator = Validator::make($input, [
    //             'brand' => 'required|string',
    //             'ram' => 'required|integer',
    //             'storage' => 'required|integer',
    //             'inner_screen' => 'required|integer',
    //             'outer_screen' => 'required|integer',
    //             'condition' => 'required|integer',
    //             'addition' => 'required|integer',
    //             'price' => 'required|string',

    //         ]);

    //         if($validator->fails()){
    //             return response()->json([
    //                 'messages' => $validator->errors()
    //             ], 400);
    //         }

    //         $sells = Sell::create([
    //             'brand' => $input['brand'],
    //             'ram' => $input['ram'],
    //             'storage' => $input['storage'],
    //             'jenis_layanan' => 2,
    //             'created_at' =>  Carbon::now()
    //         ]);

    //         $sells->save();

    //         $laptopCheck = LaptopCheck::create([
    //             'process_id' => $sells->id,
    //             'inner_screen' => $input['inner_screen'],
    //             'outer_screen' => $input['outer_screen'],
    //             'condition' => $input['condition'],
    //             'addition' => $input['addition'],
    //             'price' => $input['price'], 
    //         ]);
    //         $laptopCheck->save();
           
    //         return response()->json(['success'], 201);
    // }

    // public function sellingTelevisi(Request $request) {
    //     // if(Auth::check()){

    //         // $customer = CustomerManagement::where('users_id', Auth::id())->first();

    //         $input = $request->all();

    //         $validator = Validator::make($input, [
    //             'brand' => 'required|string',
    //             'ram' => 'required|integer',
    //             'storage' => 'required|integer',
    //             'inner_screen' => 'required|integer',
    //             'outer_screen' => 'required|integer',
    //             'condition' => 'required|integer',
    //             'addition' => 'required|integer',
    //             'price' => 'required|string',

    //         ]);

    //         if($validator->fails()){
    //             return response()->json([
    //                 'messages' => $validator->errors()
    //             ], 400);
    //         }

    //         $sells = Sell::create([
    //             'brand' => $input['brand'],
    //             'ram' => $input['ram'],
    //             'storage' => $input['storage'],
    //             'jenis_layanan' => 3,
    //             'created_at' =>  Carbon::now()
    //         ]);

    //         $sells->save();

    //         $tvCheck = TelevisiCheck::create([
    //             'process_id' => $sells->id,
    //             'inner_screen' => $input['inner_screen'],
    //             'outer_screen' => $input['outer_screen'],
    //             'condition' => $input['condition'],
    //             'addition' => $input['addition'],
    //             'price' => $input['price'], 
    //         ]);
    //         $tvCheck->save();
           
    //         return response()->json(['success'], 201);
    // }

    // public function sellingPS(Request $request) {
    //     // if(Auth::check()){

    //         // $customer = CustomerManagement::where('users_id', Auth::id())->first();

    //         $input = $request->all();

    //         $validator = Validator::make($input, [
    //             'brand' => 'required|string',
    //             'ram' => 'required|integer',
    //             'storage' => 'required|integer',
    //             'inner_screen' => 'required|integer',
    //             'outer_screen' => 'required|integer',
    //             'condition' => 'required|integer',
    //             'addition' => 'required|integer',
    //             'price' => 'required|string',

    //         ]);

    //         if($validator->fails()){
    //             return response()->json([
    //                 'messages' => $validator->errors()
    //             ], 400);
    //         }

    //         $sells = Sell::create([
    //             'brand' => $input['brand'],
    //             'storage' => $input['storage'],
    //             'jenis_layanan' => 3,
    //             'created_at' =>  Carbon::now()
    //         ]);

    //         $sells->save();

    //         $tvCheck = TelevisiCheck::create([
    //             'process_id' => $sells->id,
    //             'inner_screen' => $input['inner_screen'],
    //             'outer_screen' => $input['outer_screen'],
    //             'condition' => $input['condition'],
    //             'addition' => $input['addition'],
    //             'price' => $input['price'], 
    //         ]);
    //         $tvCheck->save();
           
    //         return response()->json(['success'], 201);
    // }
}
