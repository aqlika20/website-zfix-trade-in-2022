<?php

namespace App\Http\Controllers\BackWeb\Admin\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\BackWeb\SellLaptop;
use App\BackWeb\Partner\Partner;
use App\BackWeb\Partner\Voucher;
use App\Helper;
use App\BackWeb\Setting\UserManagement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use PDF;
use DB;
use App\BackWeb\Setting\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\Approved;

class LaptopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $page_title = 'Laptop Trade';
        $page_description = '';
        $currentUser = UserManagement::find(Auth::id());

        $partner = Partner::where([
            ['users_id', '=', $currentUser->id]
        ])->first();
        
        if ($currentUser->roles_id == 1) {
            $process_baru = SellLaptop::where([
                ['status', '=', Helper::$baru]
            ])->get();
    
            $process_laptop = SellLaptop::where([
                ['status', '=', Helper::$process]
            ])->get();
    
            $process_tolak = SellLaptop::where([
                ['status', '=', Helper::$tolak]
            ])->get();
    
            $process_rejected = SellLaptop::where([
                ['status', '=', Helper::$rejected]
            ])->get();

            $process_approve = SellLaptop::where([
                ['status', '=', Helper::$approve]
            ])->get();
        }

        if ($currentUser->roles_id == 4) {
            $process_baru = SellLaptop::where([
                ['status', '=', Helper::$baru],
                ['lokasi_trade', '=', $partner->id]
            ])->get();
    
            $process_laptop = SellLaptop::where([
                ['status', '=', Helper::$process],
                ['lokasi_trade', '=', $partner->id]
            ])->get();
    
            $process_tolak = SellLaptop::where([
                ['status', '=', Helper::$tolak],
                ['lokasi_trade', '=', $partner->id]
            ])->get();
    
            $process_rejected = SellLaptop::where([
                ['status', '=', Helper::$rejected],
                ['lokasi_trade', '=', $partner->id]
            ])->get();

            $process_approve = SellLaptop::where([
                ['status', '=', Helper::$approve]
            ])->get();
        }

        return view('pages.admin.content.laptop', compact('page_title', 'page_description', 'currentUser', 'process_baru', 'process_laptop', 'process_tolak', 'process_rejected', 'partner', 'process_approve'));
    }

    public function laptop_detail($id)
    {
        $page_title = 'Laptop Trade';
        $page_description = '';
        $currentUser = UserManagement::find(Auth::id());

        $laptop_detail = SellLaptop::where('id', $id)->first();
        $lokasi = Partner::where('id', $laptop_detail->lokasi_trade)->first();
        $voucher = Voucher::where('id', $laptop_detail->voucher_id)->first();
        // dd($lokasi);

        return view('pages.admin.content.laptop_detail', compact('page_title', 'page_description', 'currentUser', 'laptop_detail', 'lokasi', 'voucher')); 

    }

    public function store($id, Request $request)
    {
        $data = $request->all();
        $laptop_detail = SellLaptop::where('id', $id)->first();

        switch ($request->input('action')) {
            case 'approve':
                $validator = Validator::make($data, [
                    'price' => 'required',
                ]);
        
                if ($validator->fails())
                {
                    return redirect()->route('laptop-trade')->with(['error'=>'Data not valid.']);
                }
        
                $process = SellLaptop::where([
                    ['id', '=', $id]
                ])->first();

                if (!$process) {
                    return redirect()->route('laptop-trade')->with(['error'=>'Invalid parameter id.']);
                }

                $data['partners_id'] = $process->lokasi_trade;
                $partner = Partner::find($data['partners_id']);
                $data['status'] = Helper::$approve;
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
                    "en" => 'Halo ' .$laptop_detail->users->name. ', transaksi Trade in kamu sudah selesai dan voucher telah kami kirimkan ke menu QRCode pada aplikasi kamu. Silahkan kunjungi toko yang tertera pada QR Code untuk mendapatkan potongan harga pembelian kamu'
                    ); 
                
                $fields = array(
                        'app_id' => "65e23d04-6a84-441a-9bed-767d7646033e",
                        'include_external_user_ids' => array($laptop_detail->users->external_user_id),
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
                        'customers_id' => $laptop_detail->users->id,
                        'title' => "inspeksi",
                        'type' => "Laptop Trade in",
                        'description' => "Halo " .$laptop_detail->users->name. ", transaksi Trade in kamu sudah selesai dan voucher telah kami kirimkan ke menu QRCode pada aplikasi kamu. Silahkan kunjungi toko yang tertera pada QR Code untuk mendapatkan potongan harga pembelian kamu",
                        'read' => 0,
                    ]);
            
                    $notif->save();

                    $name = $laptop_detail->users->name;
                    Mail::to($laptop_detail->users->email)->send(new Approved($name));
        
                return redirect()->route('laptop-trade')->with(['success'=>'Approve Berhasil.']);

                break;

                case 'process':
                    $process = SellLaptop::where([
                        ['id', '=', $id]
                    ])->first();
                    if (!$process) {
                        return redirect()->route('laptop-trade')->with(['error'=>'Invalid parameter id.']);
                    }
                    
                    $process->price = $data['price'];
                    $process->note = $data['note'];
                    $process->status = Helper::$process;
                    $process->save();
            
                    return redirect()->route('laptop-trade')->with(['success'=>'Process Berhasil.']);
    
                    break;

            case 'rejected':
                $process = SellLaptop::where([
                    ['id', '=', $id]
                ])->first();
                if (!$process) {
                    return redirect()->route('laptop-trade')->with(['error'=>'Invalid parameter id.']);
                }
                
                $process->price = $data['price'];
                $process->note = $data['note'];
                $process->status = Helper::$rejected;
                $process->save();
        
                return redirect()->route('laptop-trade')->with(['success'=>'Reject Berhasil.']);

                break;

            case 'claim':
                $process = SellLaptop::where([
                    ['id', '=', $id]
                ])->first();
                if (!$process) {
                    return redirect()->route('laptop-trade')->with(['error'=>'Invalid parameter id.']);
                }
                
                $process->price = $data['price'];
                $process->note = $data['note'];
                $process->status = Helper::$selesai;
                $process->save();
        
                return redirect()->route('laptop-trade')->with(['success'=>'Reject Berhasil.']);

                break;
        
        }
    }

    public function Notification($id, Request $request){

        $input = $request->all();

        $laptop_detail = SellLaptop::where('id', $id)->first();

        $content = array(
            "en" => 'Halo ' .$laptop_detail->users->name. ', Team inspeksi kami akan segera datang untuk mengecek unit kamu, jadi mohon bersiap-siap ya'
            ); 
        
        $fields = array(
                'app_id' => "65e23d04-6a84-441a-9bed-767d7646033e",
                'include_external_user_ids' => array($laptop_detail->users->external_user_id),
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
            'customers_id' => $laptop_detail->users->id,
            'title' => "inspeksi",
            'type' => "Laptop Trade in",
            'description' => "Halo " .$laptop_detail->users->name. ", Team inspeksi kami akan segera datang untuk mengecek unit kamu, jadi mohon bersiap-siap ya",
            'read' => 0,
        ]);

        $notif->save();

        return redirect()->route('laptop-trade')->with(['success'=>'Memberikan Notifikasi Berhasil.']);

    }

    public function generatePDF($id){
        
        $details = SellLaptop::where('id', $id)->first();

        $laptop_detail = SellLaptop::where('id', $id)->first();
        $lokasi = Partner::where('id', $laptop_detail->lokasi_trade)->first();
        $voucher = Voucher::where('id', $laptop_detail->voucher_id)->first();
        $data = [
            'nama_penerima' =>  $laptop_detail->users->name,
            'alamat' => $laptop_detail->users->address,
            'contact' => $laptop_detail->users->contact, 
            'brand' =>  $laptop_detail->brand,
            'ram' => $laptop_detail->memory,
            'jenis_storage' => $laptop_detail->jenis_storage,
            'storage' => $laptop_detail->storages,
            'processor' => $laptop_detail->processor,
            'ukuran_laptop' => $laptop_detail->ukuran_laptop,
            'os' => $laptop_detail->os,
            'kondisi_laptop' => $laptop_detail->kondisi_laptop,
            'condition' => $laptop_detail->condition,
            'jenis_layar' => $laptop_detail->jenis_layar,
            'kondisi_layar' => $laptop_detail->kondisi_layar,
            'inner_screen' => $laptop_detail->inner_screen,
            'outer_screen' => $laptop_detail->outer_screen,
            'baterai' => $laptop_detail->baterai,
            'keyboard' => $laptop_detail->keyboard,
            'trackpad' => $laptop_detail->trackpad,
            'port' => $laptop_detail->port,
            'wifi' => $laptop_detail->wifi,
            'camera' => $laptop_detail->camera,
            'speaker' => $laptop_detail->speaker,
            'addition' => $laptop_detail->addition,
            'more_addition' => $laptop_detail->more_addition,


            'date' => date('d M Y')
        ];
           
        $pdf = PDF::loadView('pages.admin.content.pdf.pdf_laptop', $data)->setPaper('a2', 'landscape');
     
        return $pdf->download('surat_jalan_checker_'.$laptop_detail->users->name.'.pdf');
    }

    public function generatePickerPDF($id){

            $laptop_detail = SellLaptop::where('id', $id)->first();
            $lokasi = Partner::where('id', $laptop_detail->lokasi_trade)->first();
            $voucher = Voucher::where('id', $laptop_detail->voucher_id)->first();
            $data = [
                'nama_penerima' =>  $laptop_detail->users->name,
                'alamat' => $laptop_detail->users->address,
                'contact' => $laptop_detail->users->contact, 
                'brand' =>  $laptop_detail->brand,
                'ram' => $laptop_detail->memory,
                'storage' => $laptop_detail->storages,
                'layar_dalam' => $laptop_detail->inner_screen,
                'layar_luar' => $laptop_detail->outer_screen,
                'penampilan_fisik' => $laptop_detail->condition,
                'pilihan_tambahan' => $laptop_detail->addition,
                'date' => date('d M Y')
            ];
               
            $pdf = PDF::loadView('pages.admin.content.pdf.pdf_laptop_picker', $data);
         
            return $pdf->download('surat_jalan_picker_'.$laptop_detail->users->name.'.pdf');
    }

    public function acceptedLaptop(Request $request){

        $ids = $request->id;

        DB::table('process_laptop')->whereIn('id', $ids)
        ->update(['status' => 4]);
 
        return redirect()->route('partner.index')->with(['success'=>'Accept Berhasil.']);

    }

    public function generatePartnerPDF(Request $request){ 

        $currentUser = UserManagement::find(Auth::id());
        // dd($currentUser->name);
        $partner = Partner::where([
            ['users_id', '=', $currentUser->id]
        ])->first();
        
        $process = SellLaptop::where([
            ['status', '=', 3],
            ['lokasi_trade', '=', $partner->id]
        ])->get();

        $number = mt_rand(000000, 999999);

        $pdf = PDF::loadView('pages.admin.content.pdf.pdf_partner_claim_laptop', ['process'=>$process, 'currentUser'=>$currentUser, 'number' => $number]);
     
        return $pdf->download( 'surat_partner_claim_laptop.pdf');
    }
}
