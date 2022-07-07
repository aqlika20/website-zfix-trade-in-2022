<?php

namespace App\Http\Controllers\BackWeb\Admin\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\BackWeb\SellKulkas;
use App\Helper;
use App\BackWeb\Setting\UserManagement;
use App\BackWeb\Partner\Partner;
use App\BackWeb\Partner\Voucher;
use App\BackWeb\Setting\Notification;
use Illuminate\Support\Facades\Validator;
use PDF;
use DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\Approved;

class KulkasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page_title = 'Kulkas Trade';
        $page_description = '';
        $currentUser = UserManagement::find(Auth::id());

        $partner = Partner::where([
            ['users_id', '=', $currentUser->id]
        ])->first();

        if ($currentUser->roles_id == 1) {
            $process_baru = SellKulkas::where([
                ['status', '=', Helper::$baru]
            ])->get();
    
            $process_kulkas = SellKulkas::where([
                ['status', '=', Helper::$process]
            ])->get();
    
            $process_selesai = SellKulkas::where([
                ['status', '=', Helper::$selesai]
            ])->get();
    
            $process_rejected = SellKulkas::where([
                ['status', '=', Helper::$rejected]
            ])->get();

            $process_approve = SellKulkas::where([
                ['status', '=', Helper::$approve]
            ])->get();
        }

        if ($currentUser->roles_id == 4) {
            $process_baru = SellKulkas::where([
                ['status', '=', Helper::$baru],
                ['lokasi_trade', '=', $partner->id]
            ])->get();
    
            $process_kulkas = SellKulkas::where([
                ['status', '=', Helper::$process],
                ['lokasi_trade', '=', $partner->id]
            ])->get();
    
            $process_selesai = SellKulkas::where([
                ['status', '=', Helper::$selesai],
                ['lokasi_trade', '=', $partner->id]
            ])->get();
    
            $process_rejected = SellKulkas::where([
                ['status', '=', Helper::$rejected],
                ['lokasi_trade', '=', $partner->id]
            ])->get();

            $process_approve = SellKulkas::where([
                ['status', '=', Helper::$approve]
            ])->get();
        }

        return view('pages.admin.content.kulkas', compact('page_title', 'page_description', 'currentUser', 'process_baru', 'process_kulkas', 'process_selesai', 'process_rejected', 'partner', 'process_approve')); 
    }

    public function kulkas_detail($id)
    {
        $page_title = 'Kulkas Trade';
        $page_description = '';
        $currentUser = UserManagement::find(Auth::id());

        $kulkas_detail = SellKulkas::where('id', $id)->first();
        $lokasi = Partner::where('id', $kulkas_detail->lokasi_trade)->first();
        $voucher = Voucher::where('id', $kulkas_detail->voucher_id)->first();

        return view('pages.admin.content.kulkas_detail', compact('page_title', 'page_description', 'currentUser', 'kulkas_detail', 'lokasi', 'voucher')); 

    }

    public function store($id, Request $request)
    {
        $data = $request->all();
        $kulkas_detail = SellKulkas::where('id', $id)->first();

        switch ($request->input('action')) {
            case 'approve':
                $validator = Validator::make($data, [
                    'price' => 'required',
                ]);
        
                if ($validator->fails())
                {
                    return redirect()->route('kulkas-trade')->with(['error'=>'Data not valid.']);
                }
        
                $process = SellKulkas::where([
                    ['id', '=', $id]
                ])->first();
                if (!$process) {
                    return redirect()->route('kulkas-trade')->with(['error'=>'Invalid parameter id.']);
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
                $process->status = Helper::$approve;
                $process->save();

                $content = array(
                    "en" => 'Halo ' .$kulkas_detail->users->name. ', transaksi Trade in kamu sudah selesai dan voucher telah kami kirimkan ke menu QRCode pada aplikasi kamu. Silahkan kunjungi toko yang tertera pada QR Code untuk mendapatkan potongan harga pembelian kamu'
                    ); 
                
                $fields = array(
                        'app_id' => "65e23d04-6a84-441a-9bed-767d7646033e",
                        'include_external_user_ids' => array($kulkas_detail->users->external_user_id),
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
                        'customers_id' => $kulkas_detail->users->id,
                        'title' => "inspeksi",
                        'type' => "Kulkas Trade in",
                        'description' => "Halo " .$kulkas_detail->users->name. ", transaksi Trade in kamu sudah selesai dan voucher telah kami kirimkan ke menu QRCode pada aplikasi kamu. Silahkan kunjungi toko yang tertera pada QR Code untuk mendapatkan potongan harga pembelian kamu",
                        'read' => 0,
                    ]);
            
                    $notif->save();

                    $name = $kulkas_detail->users->name;
                    Mail::to($kulkas_detail->users->email)->send(new Approved($name));
        
                return redirect()->route('kulkas-trade')->with(['success'=>'Approve Berhasil.']);

                break;

                case 'process':
                    $process = SellKulkas::where([
                        ['id', '=', $id]
                    ])->first();
                    if (!$process) {
                        return redirect()->route('kulkas-trade')->with(['error'=>'Invalid parameter id.']);
                    }
                    
                    $process->price = $data['price'];
                    $process->note = $data['note'];
                    $process->status = Helper::$process;
                    $process->save();
            
                    return redirect()->route('kulkas-trade')->with(['success'=>'Process Berhasil.']);
    
                    break;

            case 'rejected':
                $process = SellKulkas::where([
                    ['id', '=', $id]
                ])->first();
                if (!$process) {
                    return redirect()->route('kulkas-trade')->with(['error'=>'Invalid parameter id.']);
                }
                
                $process->price = $data['price'];
                $process->note = $data['note'];
                $process->status = Helper::$rejected;
                $process->save();
        
                return redirect()->route('kulkas-trade')->with(['success'=>'Reject Berhasil.']);

                break;

            case 'claim':
                $process = SellKulkas::where([
                    ['id', '=', $id]
                ])->first();
                if (!$process) {
                    return redirect()->route('kulkas-trade')->with(['error'=>'Invalid parameter id.']);
                }
                
                $process->price = $data['price'];
                $process->note = $data['note'];
                $process->status = Helper::$selesai;
                $process->save();
        
                return redirect()->route('kulkas-trade')->with(['success'=>'Claim Berhasil.']);

                break;
        }
    }

    public function Notification($id, Request $request){

        $input = $request->all();

        $kulkas_detail = SellKulkas::where('id', $id)->first();

        $content = array(
            "en" => 'Halo ' .$kulkas_detail->users->name. ', Team inspeksi kami akan segera datang untuk mengecek unit kamu, jadi mohon bersiap-siap ya'
            ); 
        
        $fields = array(
                'app_id' => "65e23d04-6a84-441a-9bed-767d7646033e",
                'include_external_user_ids' => array($kulkas_detail->users->external_user_id),
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
            'customers_id' => $kulkas_detail->users->id,
            'title' => "inspeksi",
            'type' => "Kulkas Trade in",
            'description' => "Halo " .$kulkas_detail->users->name. ", Team inspeksi kami akan segera datang untuk mengecek unit kamu, jadi mohon bersiap-siap ya",
            'read' => 0,
        ]);

        $notif->save();

        return redirect()->route('kulkas-trade')->with(['success'=>'Memberikan Notifikasi Berhasil.']);

    }

    public function generatePDF($id){

        $details = SellKulkas::where('id', $id)->first();

        $kulkas_detail = SellKulkas::where('id', $id)->first();
        $lokasi = Partner::where('id', $kulkas_detail->lokasi_trade)->first();
        $voucher = Voucher::where('id', $kulkas_detail->voucher_id)->first();
        $data = [
            'nama_penerima' =>  $kulkas_detail->users->name,
            'alamat' => $kulkas_detail->users->address,
            'contact' => $kulkas_detail->users->contact,
            'brand' => $kulkas_detail->brand,
            'model' => $kulkas_detail->model,
            'type' => $kulkas_detail->type,
            'condition' => $kulkas_detail->condition,
            'kondisi_fisik' => $kulkas_detail->kondisi_fisik,
            'rubber' => $kulkas_detail->rubber,
            'tutup_freezer' => $kulkas_detail->tutup_freezer,
            'tray' => $kulkas_detail->tray,
            'ice_maker' => $kulkas_detail->ice_maker,
            'date' => date('d M Y')
        ];
           
        $pdf = PDF::loadView('pages.admin.content.pdf.pdf_kulkas', $data);
     
        return $pdf->download('surat_jalan_checker_'.$kulkas_detail->users->name.'.pdf');      
    }

    public function generatePickerPDF($id){


            $kulkas_detail = SellKulkas::where('id', $id)->first();
            $lokasi = Partner::where('id', $kulkas_detail->lokasi_trade)->first();
            $voucher = Voucher::where('id', $kulkas_detail->voucher_id)->first();
            $data = [
            'nama_penerima' =>  $kulkas_detail->users->name,
            'alamat' => $kulkas_detail->users->address,
            'contact' => $kulkas_detail->users->contact,
            'brand' => $kulkas_detail->brand,
            'model' => $kulkas_detail->model,
            'type' => $kulkas_detail->type,
            'condition' => $kulkas_detail->condition,
            'kondisi_fisik' => $kulkas_detail->kondisi_fisik,
            'rubber' => $kulkas_detail->rubber,
            'tutup_freezer' => $kulkas_detail->tutup_freezer,
            'tray' => $kulkas_detail->tray,
            'ice_maker' => $kulkas_detail->ice_maker,
            'date' => date('d M Y')
            ];
               
            $pdf = PDF::loadView('pages.admin.content.pdf.pdf_kulkas_picker', $data);
         
            return $pdf->download('surat_jalan_picker_'.$kulkas_detail->users->name.'.pdf');
    }

    public function acceptedKulkas(Request $request){

        $ids = $request->id;

        DB::table('process_kulkas')->whereIn('id', $ids)
        ->update(['status' => 4]);
 
        return redirect()->route('partner.index')->with(['success'=>'Accept Berhasil.']);

    }

    public function generatePartnerPDF(Request $request){ 

        $currentUser = UserManagement::find(Auth::id());
        // dd($currentUser->name);
        $partner = Partner::where([
            ['users_id', '=', $currentUser->id]
        ])->first();
        
        $process = SellKulkas::where([
            ['status', '=', 3],
            ['lokasi_trade', '=', $partner->id]
        ])->get();

        $number = mt_rand(000000, 999999);

        $pdf = PDF::loadView('pages.admin.content.pdf.pdf_partner_claim_kulkas', ['process'=>$process, 'currentUser'=>$currentUser, 'number' => $number]);
     
        return $pdf->download( 'surat_partner_claim_playstation.pdf');
    }
}
