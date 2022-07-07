<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BackWeb\Setting\UserManagement;
use App\BackWeb\SellTv;
use App\BackWeb\SellPs; 
use App\BackWeb\SellLaptop; 
use App\BackWeb\SellPhone; 
use App\BackWeb\SellKulkas; 
use App\BackWeb\SellMesinCuci; 
use App\BackWeb\Setting\Notification;

use DB;
use App\BackWeb\Partner\Partner;
use App\BackWeb\Partner\Voucher;
use App\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Hashids\Hashids;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class getQRController extends Controller
{
    public function index() {
        if(Auth::check()){

        $hashids = new Hashids('', 15);

        $laptop_exist = SellLaptop::where([
            ['customers_id', '=', Auth::id()],
            ['status', '=', 4]
            ])->get();
        $tv_exist = SellTv::where([
            ['customers_id', '=', Auth::id()],
            ['status', '=', 4]
            ])->get();
        $ps_exist = SellPs::where([
            ['customers_id', '=', Auth::id()],
            ['status', '=', 4]
            ])->get();

        $handphone_exist = SellPhone::where([
            ['customers_id', '=', Auth::id()],
            ['status', '=', 4]
            ])->get();

        $kulkas_exist = SellKulkas::where([
            ['customers_id', '=', Auth::id()],
            ['status', '=', 4]
            ])->get();

        $mesin_cuci_exist = SellMesinCuci::where([
            ['customers_id', '=', Auth::id()],
            ['status', '=', 4]
            ])->get();
                
        $store = Partner::all();
        $voucher = Voucher::all();

        $data = [
            'arr' => $laptop_exist,
            'arr2' => $tv_exist,
            'arr3' => $ps_exist,
            'arr4' => $handphone_exist,
            'arr5' => $kulkas_exist,
            'arr6' => $mesin_cuci_exist,
            'store' => $store,
            'voucher' => $voucher
        ];
            return response()->json(['data' => $data], 200);
        }
    }

    public function getDataQR(Request $request) {
        $laptop_exist = SellLaptop::all();
        $ps_exist = SellPs::all();
        $tv_exist = SellTv::all();
        $handphone_exist = SellPhone::all();
        $kulkas_exist = SellKulkas::all();
        $mesin_cuci_exist = SellMesinCuci::all();


        $store = Partner::all();
        // dd($store);
        $data = [
            'store' => $store,
            'laptop' => $laptop_exist,
            'ps' => $ps_exist,
            'tv' => $tv_exist,
            'hp' => $handphone_exist,
            'kulkas' => $kulkas_exist,
            'mesin_cuci' => $mesin_cuci_exist
        ];

        return response()->json(['data' => $data], 200);

    }

    public function getManualDataQr(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [
            'voucher_key' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        $voucher = Voucher::where([
            ['voucher_key', '=', $input['voucher_key']]
        ])->first();

        $store = Partner::all();

        $kulkas_manual = SellKulkas::where('voucher_id', '=', $voucher->id)->first();
        $laptop_manual = SellLaptop::where('voucher_id', '=', $voucher->id)->first();
        $ps_manual = SellPs::where('voucher_id', '=', $voucher->id)->first();
        $tv_manual = SellTv::where('voucher_id', '=', $voucher->id)->first();
        $handphone_manual = SellPhone::where('voucher_id', '=', $voucher->id)->first();
        $kulkas_manual = SellKulkas::where('voucher_id', '=', $voucher->id)->first();
        $mesin_cuci_manual = SellMesinCuci::where('voucher_id', '=', $voucher->id)->first();

        $data = [
            'store' => $store,
            'laptop_manual' => $laptop_manual,
            'ps_manual' => $ps_manual,
            'tv_manual' => $tv_manual,
            'handphone_manual' => $handphone_manual,
            'kulkas_manual' => $kulkas_manual,
            'mesin_cuci_manual' => $mesin_cuci_manual
        ];


        return response()->json(['data' => $data], 200);

    }

    public function getDataTransaction(){

        if(Auth::check()){

            $laptop_exist = SellLaptop::where('customers_id', '=', Auth::id())->get();
            $tv_exist = SellTv::where('customers_id', '=', Auth::id())->get();
            $ps_exist = SellPs::where('customers_id', '=', Auth::id())->get();
            $handphone_exist = SellPhone::where('customers_id', '=', Auth::id())->get();
            $kulkas_exist = SellKulkas::where('customers_id', '=', Auth::id())->get();
            $mesin_cuci_exist = SellMesinCuci::where('customers_id', '=', Auth::id())->get();

    
            $data = [
                'data_arr' => $laptop_exist,
                'data_arr2' => $tv_exist,
                'data_arr3' => $ps_exist,
                'data_arr4' => $handphone_exist,
                'data_arr5' => $kulkas_exist,
                'data_arr6' => $mesin_cuci_exist
            ];
                return response()->json(['data' => $data], 200);
            }

    }

    public function claimLaptop(Request $request){
        // if(Auth::check()){

        $input = $request->all();

        $validator = Validator::make($input, [
            'id' => 'required',
        ]);


        if($validator->fails()){
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        $process = SellLaptop::where([
            ['id', '=', $input['id']]
        ])->first();

        
        if (!$process) {
            return response()->json(['error'], 401);
        }

        $partners = Partner::where([
            ['id', '=', $process->lokasi_trade]
        ])->first();

        $allowed_user = UserManagement::where([
            ['id', '=', $partners->users_id]
        ])->first();

        if (Auth::id() != $allowed_user->id) {
            return response()->json(['Toko Tidak Dapat Melakukan Claim. Periksa Lokasi Toko Anda Melakukan Trade.'], 401);
        }

        if ($process->status != 4) {
            return response()->json(['Mohon maaf kode voucher yang ada gunakan sudah tidak berlaku lagi, harap menghubungi customer service kami untuk info lebih lanjut. Terima Kasih'], 401);
        }

        $content = array(
            "en" => 'Halo ' .$process->users->name. ', selamat voucher kamu telah berhasil di gunakan di ' .$allowed_user->name
            ); 
        
        $fields = array(
                'app_id' => "65e23d04-6a84-441a-9bed-767d7646033e",
                'include_external_user_ids' => array($process->users->external_user_id),
                'channel_for_external_user_ids' => 'push',
                'data' => array("foo" => "bar"),
                'contents' => $content
            );
            

        $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://onesignal.com/api/v1/notifications',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($fields),

            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic MzgyYWU0NmMtMmQwNi00NzRmLThmM2UtNGVkYWY1NzY0ODZl',
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);

            $notif = Notification::create([
                'customers_id' => $process->users->id,
                'title' => "Claim",
                'type' => "Laptop Trade in",
                'description' => "Halo " .$process->users->name. ", selamat voucher kamu telah berhasil di gunakan di " .$allowed_user->name,
                'read' => 0,
            ]);
    
        $notif->save();
    
        $process->status = 3;
        $process->save();

        return response()->json(['success'], 201);
        
        // }
    }

    public function claimTV(Request $request){
        // if(Auth::check()){

        $input = $request->all();

        $validator = Validator::make($input, [
            'id' => 'required',
        ]);


        if($validator->fails()){
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        $process = SellTv::where([
            ['id', '=', $input['id']]
        ])->first();

        
        if (!$process) {
            return response()->json(['error'], 401);
        }

        $partners = Partner::where([
            ['id', '=', $process->lokasi_trade]
        ])->first();

        $allowed_user = UserManagement::where([
            ['id', '=', $partners->users_id]
        ])->first();

        if (Auth::id() != $allowed_user->id) {
            return response()->json(['Toko Tidak Dapat Melakukan Claim. Periksa Lokasi Toko Anda Melakukan Trade.'], 401);
        }

        if ($process->status != 4) {
            return response()->json(['Mohon maaf kode voucher yang ada gunakan sudah tidak berlaku lagi, harap menghubungi customer service kami untuk info lebih lanjut. Terima Kasih'], 401); 
        }

        $content = array(
            "en" => 'Halo ' .$process->users->name. ', selamat voucher kamu telah berhasil di gunakan di ' .$allowed_user->name
            ); 
        
        $fields = array(
                'app_id' => "65e23d04-6a84-441a-9bed-767d7646033e",
                'include_external_user_ids' => array($process->users->external_user_id),
                'channel_for_external_user_ids' => 'push',
                'data' => array("foo" => "bar"),
                'contents' => $content
            );
            

        $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://onesignal.com/api/v1/notifications',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($fields),

            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic MzgyYWU0NmMtMmQwNi00NzRmLThmM2UtNGVkYWY1NzY0ODZl',
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);

            $notif = Notification::create([
                'customers_id' => $process->users->id,
                'title' => "Claim",
                'type' => "Televisi Trade in",
                'description' => "Halo " .$process->users->name. ", selamat voucher kamu telah berhasil di gunakan di " .$allowed_user->name,
                'read' => 0,
            ]);
    
        $notif->save();
    
        $process->status = 3;
        $process->save();

        return response()->json(['success'], 201);
        
        // }
    }

    public function claimPS(Request $request){
        // if(Auth::check()){

        $input = $request->all();

        $validator = Validator::make($input, [
            'id' => 'required',
        ]);


        if($validator->fails()){
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        $process = SellPs::where([
            ['id', '=', $input['id']]
        ])->first();

        
        if (!$process) {
            return response()->json(['error'], 401);
        }

        $partners = Partner::where([
            ['id', '=', $process->lokasi_trade]
        ])->first();

        $allowed_user = UserManagement::where([
            ['id', '=', $partners->users_id]
        ])->first();

        if (Auth::id() != $allowed_user->id) {
            return response()->json(['Toko Tidak Dapat Melakukan Claim. Periksa Lokasi Toko Anda Melakukan Trade.'], 401);
        }

        if ($process->status != 4) {
            return response()->json(['Mohon maaf kode voucher yang ada gunakan sudah tidak berlaku lagi, harap menghubungi customer service kami untuk info lebih lanjut. Terima Kasih'], 401);
        }

        $content = array(
            "en" => 'Halo ' .$process->users->name. ', selamat voucher kamu telah berhasil di gunakan di ' .$allowed_user->name
            ); 
        
        $fields = array(
                'app_id' => "65e23d04-6a84-441a-9bed-767d7646033e",
                'include_external_user_ids' => array($process->users->external_user_id),
                'channel_for_external_user_ids' => 'push',
                'data' => array("foo" => "bar"),
                'contents' => $content
            );
            

        $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://onesignal.com/api/v1/notifications',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($fields),

            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic MzgyYWU0NmMtMmQwNi00NzRmLThmM2UtNGVkYWY1NzY0ODZl',
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);

            $notif = Notification::create([
                'customers_id' => $process->users->id,
                'title' => "Claim",
                'type' => "Playstation Trade in",
                'description' => "Halo " .$process->users->name. ", selamat voucher kamu telah berhasil di gunakan di " .$allowed_user->name,
                'read' => 0,
            ]);
    
        $notif->save();
    
        $process->status = 3;
        $process->save();

        return response()->json(['success'], 201);
        
        // }
    }

    public function claimHandphone(Request $request){
        // if(Auth::check()){

        $input = $request->all();

        $validator = Validator::make($input, [
            'id' => 'required',
        ]);


        if($validator->fails()){
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        $process = SellPhone::where([
            ['id', '=', $input['id']]
        ])->first();

        
        if (!$process) {
            return response()->json(['error'], 401);
        }

        $partners = Partner::where([
            ['id', '=', $process->lokasi_trade]
        ])->first();

        $allowed_user = UserManagement::where([
            ['id', '=', $partners->users_id]
        ])->first();

        if (Auth::id() != $allowed_user->id) {
            return response()->json(['Toko Tidak Dapat Melakukan Claim. Periksa Lokasi Toko Anda Melakukan Trade.'], 401);
        }

        if ($process->status != 4) {
            return response()->json(['Mohon maaf kode voucher yang ada gunakan sudah tidak berlaku lagi, harap menghubungi customer service kami untuk info lebih lanjut. Terima Kasih'], 401);
        }

        $content = array(
            "en" => 'Halo ' .$process->users->name. ', selamat voucher kamu telah berhasil di gunakan di ' .$allowed_user->name
            ); 
        
        $fields = array(
                'app_id' => "65e23d04-6a84-441a-9bed-767d7646033e",
                'include_external_user_ids' => array($process->users->external_user_id),
                'channel_for_external_user_ids' => 'push',
                'data' => array("foo" => "bar"),
                'contents' => $content
            );
            

        $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://onesignal.com/api/v1/notifications',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($fields),

            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic MzgyYWU0NmMtMmQwNi00NzRmLThmM2UtNGVkYWY1NzY0ODZl',
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);

            $notif = Notification::create([
                'customers_id' => $process->users->id,
                'title' => "Claim",
                'type' => "Handphone Trade in",
                'description' => "Halo " .$process->users->name. ", selamat voucher kamu telah berhasil di gunakan di " .$allowed_user->name,
                'read' => 0,
            ]);
    
        $notif->save();
    
        $process->status = 3;
        $process->save();

        return response()->json(['success'], 201);
        
        // }
    }

    public function claimKulkas(Request $request){
        // if(Auth::check()){

        $input = $request->all();

        $validator = Validator::make($input, [
            'id' => 'required',
        ]);


        if($validator->fails()){
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        $process = SellKulkas::where([
            ['id', '=', $input['id']]
        ])->first();

        
        if (!$process) {
            return response()->json(['error'], 401);
        }

        $partners = Partner::where([
            ['id', '=', $process->lokasi_trade]
        ])->first();

        $allowed_user = UserManagement::where([
            ['id', '=', $partners->users_id]
        ])->first();

        if (Auth::id() != $allowed_user->id) {
            return response()->json(['Toko Tidak Dapat Melakukan Claim. Periksa Lokasi Toko Anda Melakukan Trade.'], 401);
        }

        if ($process->status != 4) {
            return response()->json(['Mohon maaf kode voucher yang ada gunakan sudah tidak berlaku lagi, harap menghubungi customer service kami untuk info lebih lanjut. Terima Kasih'], 401);
        }

        $content = array(
            "en" => 'Halo ' .$process->users->name. ', selamat voucher kamu telah berhasil di gunakan di ' .$allowed_user->name
            ); 
        
        $fields = array(
                'app_id' => "65e23d04-6a84-441a-9bed-767d7646033e",
                'include_external_user_ids' => array($process->users->external_user_id),
                'channel_for_external_user_ids' => 'push',
                'data' => array("foo" => "bar"),
                'contents' => $content
            );
            

        $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://onesignal.com/api/v1/notifications',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($fields),

            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic MzgyYWU0NmMtMmQwNi00NzRmLThmM2UtNGVkYWY1NzY0ODZl',
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);

            $notif = Notification::create([
                'customers_id' => $process->users->id,
                'title' => "Claim",
                'type' => "Kulkas Trade in",
                'description' => "Halo " .$process->users->name. ", selamat voucher kamu telah berhasil di gunakan di " .$allowed_user->name,
                'read' => 0,
            ]);
    
        $notif->save();
    
        $process->status = 3;
        $process->save();

        return response()->json(['success'], 201);
        
        // }
    }

    public function claimMesinCuci(Request $request){
        // if(Auth::check()){

        $input = $request->all();

        $validator = Validator::make($input, [
            'id' => 'required',
        ]);


        if($validator->fails()){
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        $process = SellMesinCuci::where([
            ['id', '=', $input['id']]
        ])->first();

        
        if (!$process) {
            return response()->json(['error'], 401);
        }

        $partners = Partner::where([
            ['id', '=', $process->lokasi_trade]
        ])->first();

        $allowed_user = UserManagement::where([
            ['id', '=', $partners->users_id]
        ])->first();

        if (Auth::id() != $allowed_user->id) {
            return response()->json(['Toko Tidak Dapat Melakukan Claim. Periksa Lokasi Toko Anda Melakukan Trade.'], 401);
        }

        if ($process->status != 4) {
            return response()->json(['Mohon maaf kode voucher yang ada gunakan sudah tidak berlaku lagi, harap menghubungi customer service kami untuk info lebih lanjut. Terima Kasih'], 401);
        }

        $content = array(
            "en" => 'Halo ' .$process->users->name. ', selamat voucher kamu telah berhasil di gunakan di ' .$allowed_user->name
            ); 
        
        $fields = array(
                'app_id' => "65e23d04-6a84-441a-9bed-767d7646033e",
                'include_external_user_ids' => array($process->users->external_user_id),
                'channel_for_external_user_ids' => 'push',
                'data' => array("foo" => "bar"),
                'contents' => $content
            );
            

        $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://onesignal.com/api/v1/notifications',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($fields),

            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic MzgyYWU0NmMtMmQwNi00NzRmLThmM2UtNGVkYWY1NzY0ODZl',
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);

            $notif = Notification::create([
                'customers_id' => $process->users->id,
                'title' => "Claim",
                'type' => "Mesin Cuci Trade in",
                'description' => "Halo " .$process->users->name. ", selamat voucher kamu telah berhasil di gunakan di " .$allowed_user->name,
                'read' => 0,
            ]);
    
        $notif->save();
    
        $process->status = 3;
        $process->save();

        return response()->json(['success'], 201);
        
        // }
    }

}
