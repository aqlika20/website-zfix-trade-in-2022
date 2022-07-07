<?php

namespace App\Http\Controllers\BackWeb\Admin\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\BackWeb\SellTv;
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

class TelevisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $page_title = 'Televisi Trade';
        $page_description = '';
        $currentUser = UserManagement::find(Auth::id());

        $partner = Partner::where([
            ['users_id', '=', $currentUser->id]
        ])->first();

        // dd($partner);

        if ($currentUser->roles_id == 1) {
            $process_baru = SellTv::where([
                ['status', '=', Helper::$baru]
            ])->get();
    
            $process_tv = SellTv::where([
                ['status', '=', Helper::$process]
            ])->get();
    
            $process_tolak = SellTv::where([
                ['status', '=', Helper::$tolak]
            ])->get();
    
            $process_rejected = SellTv::where([
                ['status', '=', Helper::$rejected]
            ])->get();

            $process_approve = SellTv::where([
                ['status', '=', Helper::$approve]
            ])->get();
        }

        if ($currentUser->roles_id == 4) {
            $process_baru = SellTv::where([
                ['status', '=', Helper::$baru],
                ['lokasi_trade', '=', $partner->id]
            ])->get();
    
            $process_tv = SellTv::where([
                ['status', '=', Helper::$process],
                ['lokasi_trade', '=', $partner->id]
            ])->get();
    
            $process_tolak = SellTv::where([
                ['status', '=', Helper::$tolak],
                ['lokasi_trade', '=', $partner->id]
            ])->get();
    
            $process_rejected = SellTv::where([
                ['status', '=', Helper::$rejected],
                ['lokasi_trade', '=', $partner->id]
            ])->get();

            $process_approve = SellTv::where([
                ['status', '=', Helper::$approve],
                ['lokasi_trade', '=', $partner->id]
            ])->get();
        }

        return view('pages.admin.content.televisi', compact('page_title', 'page_description', 'currentUser', 'process_baru', 'process_tv', 'process_tolak', 'process_rejected', 'partner', 'process_approve')); 
    }

    public function televisi_detail($id)
    {
        $page_title = 'Televisi Trade';
        $page_description = '';
        $currentUser = UserManagement::find(Auth::id());

        $tv_detail = SellTv::where('id', $id)->first();
        $lokasi = Partner::where('id', $tv_detail->lokasi_trade)->first();
        $voucher = Voucher::where('id', $tv_detail->voucher_id)->first();

        return view('pages.admin.content.televisi_detail', compact('page_title', 'page_description', 'currentUser', 'tv_detail', 'lokasi', 'voucher')); 

    }

    public function store($id, Request $request)
    {
        $data = $request->all();
        $tv_detail = SellTv::where('id', $id)->first();

        switch ($request->input('action')) {
            case 'approve':
                $validator = Validator::make($data, [
                    'price' => 'required',
                ]);
        
                if ($validator->fails())
                {
                    return redirect()->route('tv-trade')->with(['error'=>'Data not valid.']);
                }
        
                $process = SellTv::where([
                    ['id', '=', $id]
                ])->first();
                if (!$process) {
                    return redirect()->route('tv-trade')->with(['error'=>'Invalid parameter id.']);
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
                    "en" => 'Halo ' .$tv_detail->users->name. ', transaksi Trade in kamu sudah selesai dan voucher telah kami kirimkan ke menu QRCode pada aplikasi kamu. Silahkan kunjungi toko yang tertera pada QR Code untuk mendapatkan potongan harga pembelian kamu'
                    ); 
                
                $fields = array(
                        'app_id' => "65e23d04-6a84-441a-9bed-767d7646033e",
                        'include_external_user_ids' => array($tv_detail->users->external_user_id),
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
                        'customers_id' => $tv_detail->users->id,
                        'title' => "inspeksi",
                        'type' => "Televisi Trade in",
                        'description' => "Halo " .$tv_detail->users->name. ", transaksi Trade in kamu sudah selesai dan voucher telah kami kirimkan ke menu QRCode pada aplikasi kamu. Silahkan kunjungi toko yang tertera pada QR Code untuk mendapatkan potongan harga pembelian kamu",
                        'read' => 0,
                    ]);
            
                    $notif->save();

                    $name = $tv_detail->users->name;
                    Mail::to($tv_detail->users->email)->send(new Approved($name));
        
                return redirect()->route('tv-trade')->with(['success'=>'Approve Berhasil.']);

            break;

            case 'process':
                $process = SellTv::where([
                    ['id', '=', $id]
                ])->first();
                if (!$process) {
                    return redirect()->route('tv-trade')->with(['error'=>'Invalid parameter id.']);
                }
                
                $process->price = $data['price'];
                $process->note = $data['note'];
                $process->status = Helper::$process;
                $process->save();
        
                return redirect()->route('tv-trade')->with(['success'=>'Process Berhasil.']);

            break;

            case 'rejected':
                $process = SellTv::where([
                    ['id', '=', $id]
                ])->first();
                if (!$process) {
                    return redirect()->route('tv-trade')->with(['error'=>'Invalid parameter id.']);
                }
                
                $process->price = $data['price'];
                $process->note = $data['note'];
                $process->status = Helper::$rejected;
                $process->save();
        
                return redirect()->route('tv-trade')->with(['success'=>'Reject Berhasil.']);

            break;

            case 'claim':
                $process = SellTv::where([
                    ['id', '=', $id]
                ])->first();
                if (!$process) {
                    return redirect()->route('tv-trade')->with(['error'=>'Invalid parameter id.']);
                }
                
                $process->price = $data['price'];
                $process->note = $data['note'];
                $process->status = Helper::$selesai;
                $process->save();
        
                return redirect()->route('tv-trade')->with(['success'=>'Reject Berhasil.']);

            break;

        
        }
    }

    public function Notification($id, Request $request){

        $input = $request->all();

        $tv_detail = SellTv::where('id', $id)->first();

        $content = array(
            "en" => 'Halo ' .$tv_detail->users->name. ', Team inspeksi kami akan segera datang untuk mengecek unit kamu, jadi mohon bersiap-siap ya'
            ); 
        
        $fields = array(
                'app_id' => "65e23d04-6a84-441a-9bed-767d7646033e",
                'include_external_user_ids' => array($tv_detail->users->external_user_id),
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
            'customers_id' => $tv_detail->users->id,
            'title' => "inspeksi",
            'type' => "Televisi Trade in",
            'description' => "Halo " .$tv_detail->users->name. ", Team inspeksi kami akan segera datang untuk mengecek unit kamu, jadi mohon bersiap-siap ya",
            'read' => 0,
        ]);

        $notif->save();

        return redirect()->route('tv-trade')->with(['success'=>'Memberikan Notifikasi Berhasil.']);

    }

    public function generatePDF($id){

        $details = SellTv::where('id', $id)->first();

        $tv_detail = SellTv::where('id', $id)->first();
        $lokasi = Partner::where('id', $tv_detail->lokasi_trade)->first();
        $voucher = Voucher::where('id', $tv_detail->voucher_id)->first();
        $data = [
            'nama_penerima' =>  $tv_detail->users->name,
            'alamat' => $tv_detail->users->address,
            'contact' => $tv_detail->users->contact, 
            'brand' =>  $tv_detail->brand,
            'jenis' => $tv_detail->jenis_tv,
            'ukuran' => $tv_detail->inch,
            'kondisi_layar' => $tv_detail->kondisi_layar,
            'inner_screen' => $tv_detail->inner_screen,
            'outer_screen' => $tv_detail->outer_screen,
            'wifi' => $tv_detail->wifi,
            'suara' => $tv_detail->suara,
            'port' => $tv_detail->port,
            'condition' => $tv_detail->condition,
            'addition' => $tv_detail->addition,
            'kondisi_tv' => $tv_detail->kondisi_tv,
            'date' => date('d M Y')
        ];
           
        $pdf = PDF::loadView('pages.admin.content.pdf.pdf_tv', $data)->setPaper('a4', 'landscape');
     
        return $pdf->download('surat_jalan_checker_'.$tv_detail->users->name.'.pdf');
    }

    public function generatePickerPDF($id){

            $tv_detail = SellTv::where('id', $id)->first();
            $lokasi = Partner::where('id', $tv_detail->lokasi_trade)->first();
            $voucher = Voucher::where('id', $tv_detail->voucher_id)->first();
            $data = [
            'nama_penerima' =>  $tv_detail->users->name,
            'alamat' => $tv_detail->users->address,
            'contact' => $tv_detail->users->contact, 
            'brand' =>  $tv_detail->brand,
            'jenis' => $tv_detail->jenis_tv,
            'ukuran' => $tv_detail->inch,
            'kondisi_layar' => $tv_detail->kondisi_layar,
            'inner_screen' => $tv_detail->inner_screen,
            'outer_screen' => $tv_detail->outer_screen,
            'wifi' => $tv_detail->wifi,
            'suara' => $tv_detail->suara,
            'port' => $tv_detail->port,
            'condition' => $tv_detail->condition,
            'addition' => $tv_detail->addition,
            'kondisi_tv' => $tv_detail->kondisi_tv,
            'date' => date('d M Y')
            ];
               
            $pdf = PDF::loadView('pages.admin.content.pdf.pdf_tv_picker', $data)->setPaper('a4', 'landscape');
         
            return $pdf->download( 'surat_jalan_picker_'.$tv_detail->users->name.'.pdf');
    }

    public function acceptedTV(Request $request){

        $ids = $request->id;

        DB::table('process_tv')->whereIn('id', $ids)
        ->update(['status' => 4]);
 
        return redirect()->route('partner.index')->with(['success'=>'Accept Berhasil.']);

    }

    public function generatePartnerPDF(Request $request){ 

        $currentUser = UserManagement::find(Auth::id());
        // dd($currentUser->name);
        $partner = Partner::where([
            ['users_id', '=', $currentUser->id]
        ])->first();
        
        $process = SellTv::where([
            ['status', '=', 3],
            ['lokasi_trade', '=', $partner->id]
        ])->get();

        $number = mt_rand(000000, 999999);

        $pdf = PDF::loadView('pages.admin.content.pdf.pdf_partner_claim', ['process'=>$process, 'currentUser'=>$currentUser, 'number' => $number]);
     
        return $pdf->download( 'surat_partner_claim.pdf');
    }


}
