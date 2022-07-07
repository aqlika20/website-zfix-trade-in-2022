<?php

namespace App\Http\Controllers\BackWeb\Admin\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\BackWeb\SellPhone;
use App\BackWeb\Setting\UserManagement;
use App\Helper;
use App\BackWeb\Partner\Partner;
use App\BackWeb\Partner\Voucher;
use Illuminate\Support\Facades\Validator;
use PDF;
use DB;
use App\BackWeb\Setting\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\Approved;

class PhoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $page_title = 'Handphone/Tablet Trade';
        $page_description = '';
        $currentUser = UserManagement::find(Auth::id());

        $partner = Partner::where([
            ['users_id', '=', $currentUser->id]
        ])->first();

        // dd($partner);

        if ($currentUser->roles_id == 1) {
            $process_baru = SellPhone::where([
                ['status', '=', Helper::$baru]
            ])->get();
    
            $process_hp = SellPhone::where([
                ['status', '=', Helper::$process]
            ])->get();
    
            $process_selesai = SellPhone::where([
                ['status', '=', Helper::$selesai]
            ])->get();
    
            $process_rejected = SellPhone::where([
                ['status', '=', Helper::$rejected]
            ])->get();
        }

        if ($currentUser->roles_id == 4) {
            $process_baru = SellPhone::where([
                ['status', '=', Helper::$baru],
                ['lokasi_trade', '=', $partner->id]
            ])->get();
    
            $process_hp= SellPhone::where([
                ['status', '=', Helper::$process],
                ['lokasi_trade', '=', $partner->id]
            ])->get();
    
            $process_selesai = SellPhone::where([
                ['status', '=', Helper::$selesai],
                ['lokasi_trade', '=', $partner->id]
            ])->get();
    
            $process_rejected = SellPhone::where([
                ['status', '=', Helper::$rejected],
                ['lokasi_trade', '=', $partner->id]
            ])->get();
        }

        return view('pages.admin.content.phone', compact('page_title', 'page_description', 'currentUser', 'process_baru', 'process_hp', 'process_selesai', 'process_rejected', 'partner')); 
    }

    public function handphone_detail($id)
    {
        $page_title = 'Handphone/Tablet Trade';
        $page_description = '';
        $currentUser = UserManagement::find(Auth::id());

        $hp_detail = SellPhone::where('id', $id)->first();
        $lokasi = Partner::where('id', $hp_detail->lokasi_trade)->first();
        $voucher = Voucher::where('id', $hp_detail->voucher_id)->first();

        return view('pages.admin.content.phone_detail', compact('page_title', 'page_description', 'currentUser', 'hp_detail', 'lokasi', 'voucher')); 

    }

    public function store($id, Request $request)
    {
        $data = $request->all();
        $hp_detail = SellPhone::where('id', $id)->first();

        switch ($request->input('action')) {
            case 'process':
                $validator = Validator::make($data, [
                    'price' => 'required',
                ]);
        
                if ($validator->fails())
                {
                    return redirect()->route('phone-trade')->with(['error'=>'Data not valid.']);
                }
        
                $process = SellPhone::where([
                    ['id', '=', $id]
                ])->first();
                if (!$process) {
                    return redirect()->route('phone-trade')->with(['error'=>'Invalid parameter id.']);
                }

                $data['partners_id'] = $process->lokasi_trade;
                $partner = Partner::find($data['partners_id']);
                $data['status'] = 1;
                $data['voucher_key'] = $partner->partner_key.'-'.Helper::getVoucherKey($partner->partner_key);

                Voucher::create($data);

                $vou =  Voucher::where([
                    ['partners_id', '=', $process->lokasi_trade]
                ])->latest('id')->first();        
                $process->voucher_id = $vou->id;
                
                $process->price = $data['price'];
                $process->note = $data['note'];
                $process->status = 2;
                $process->save();

                $content = array(
                    "en" => 'Halo ' .$hp_detail->users->name. ', transaksi Trade in kamu sudah selesai dan voucher telah kami kirimkan ke menu QRCode pada aplikasi kamu. Silahkan kunjungi toko yang tertera pada QR Code untuk mendapatkan potongan harga pembelian kamu'
                    ); 
                
                $fields = array(
                        'app_id' => "65e23d04-6a84-441a-9bed-767d7646033e",
                        'include_external_user_ids' => array($hp_detail->users->external_user_id),
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
                        'customers_id' => $hp_detail->users->id,
                        'title' => "inspeksi",
                        'type' => "Hanphone Selling",
                        'description' => "Halo " .$hp_detail->users->name. ", transaksi Trade in kamu sudah selesai dan voucher telah kami kirimkan ke menu QRCode pada aplikasi kamu. Silahkan kunjungi toko yang tertera pada QR Code untuk mendapatkan potongan harga pembelian kamu",
                        'read' => 0,
                    ]);
            
                    $notif->save();

                    $name = $hp_detail->users->name;
                    Mail::to($hp_detail->users->email)->send(new Approved($name));
        
                return redirect()->route('phone-trade')->with(['success'=>'Process Berhasil.']);

                break;

            case 'rejected':
                $process = SellPhone::where([
                    ['id', '=', $id]
                ])->first();
                if (!$process) {
                    return redirect()->route('phone-trade')->with(['error'=>'Invalid parameter id.']);
                }
                
                $process->price = $data['price'];
                $process->note = $data['note'];
                $process->status = Helper::$rejected;
                $process->save();
        
                return redirect()->route('phone-trade')->with(['success'=>'Reject Berhasil.']);

                break;

            case 'claim':
                $process = SellPhone::where([
                    ['id', '=', $id]
                ])->first();
                if (!$process) {
                    return redirect()->route('phone-trade')->with(['error'=>'Invalid parameter id.']);
                }
                
                $process->price = $data['price'];
                $process->note = $data['note'];
                $process->status = Helper::$selesai;
                $process->save();
        
                return redirect()->route('phone-trade')->with(['success'=>'Reject Berhasil.']);

                break;

        
        }
    }

    public function Notification($id, Request $request){

        $input = $request->all();

        $hp_detail = SellPhone::where('id', $id)->first();

        $content = array(
            "en" => 'Halo ' .$hp_detail->users->name. ', Team inspeksi kami akan segera datang untuk mengecek unit kamu, jadi mohon bersiap-siap ya'
            ); 
        
        $fields = array(
                'app_id' => "65e23d04-6a84-441a-9bed-767d7646033e",
                'include_external_user_ids' => array($hp_detail->users->external_user_id),
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
            'customers_id' => $hp_detail->users->id,
            'title' => "inspeksi",
            'type' => "Handphone Selling",
            'description' => "Halo " .$hp_detail->users->name. ", Team inspeksi kami akan segera datang untuk mengecek unit kamu, jadi mohon bersiap-siap ya",
            'read' => 0,
        ]);

        $notif->save();

        return redirect()->route('phone-trade')->with(['success'=>'Memberikan Notifikasi Berhasil.']);

    }

    public function acceptedHP(Request $request){

        $ids = $request->id;

        DB::table('process_phone')->whereIn('id', $ids)
        ->update(['status' => 4]);
 
        return redirect()->route('partner.index')->with(['success'=>'Accept Berhasil.']);

    }

    public function generatePDF($id){

        $details = SellPhone::where('id', $id)->first();

        $hp_detail = SellPhone::where('id', $id)->first();
        $lokasi = Partner::where('id', $hp_detail->lokasi_trade)->first();
        $voucher = Voucher::where('id', $hp_detail->voucher_id)->first();
        $data = [
            'nama_penerima' =>  $hp_detail->users->name,
            'alamat' => $hp_detail->users->address,
            'contact' => $hp_detail->users->contact, 
            'brand' =>  $hp_detail->brand,
            'storage' => $hp_detail->storages,
            'ram' => $hp_detail->ram,
            'screen' => $hp_detail->screen_has_problem,
            'camera' => $hp_detail->camera_has_problem,
            'wifi' => $hp_detail->wifi_has_problem,
            'button' => $hp_detail->button_has_problem,
            'vibration' => $hp_detail->vibration,
            'finger' => $hp_detail->finger,
            'date' => date('d M Y')
        ];
           
        $pdf = PDF::loadView('pages.admin.content.pdf.pdf_hp', $data);
     
        return $pdf->download('surat_jalan_checker_'.$hp_detail->users->name.'.pdf');
    }

    public function generatePickerPDF($id){

            $hp_detail = SellPhone::where('id', $id)->first();
            $lokasi = Partner::where('id', $hp_detail->lokasi_trade)->first();
            $voucher = Voucher::where('id', $hp_detail->voucher_id)->first();
            $data = [
                'nama_penerima' =>  $hp_detail->users->name,
                'alamat' => $hp_detail->users->address,
                'contact' => $hp_detail->users->contact, 
                'brand' =>  $hp_detail->brand,
                'storage' => $hp_detail->storages,
                'ram' => $hp_detail->ram,
                'screen' => $hp_detail->screen_has_problem,
                'camera' => $hp_detail->camera_has_problem,
                'wifi' => $hp_detail->wifi_has_problem,
                'button' => $hp_detail->button_has_problem,
                'vibration' => $hp_detail->vibration,
                'finger' => $hp_detail->finger,
                'date' => date('d M Y')
            ];
               
            $pdf = PDF::loadView('pages.admin.content.pdf.pdf_hp_picker', $data);
         
            return $pdf->download( 'surat_jalan_picker_'.$hp_detail->users->name.'.pdf');
    }
}
