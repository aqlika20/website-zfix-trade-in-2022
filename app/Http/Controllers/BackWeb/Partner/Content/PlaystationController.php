<?php

namespace App\Http\Controllers\BackWeb\Partner\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\BackWeb\SellPs;
use App\Helper;
use App\BackWeb\Setting\UserManagement;
use App\BackWeb\Partner\Partner;
use App\BackWeb\Partner\Voucher;
use Illuminate\Support\Facades\Validator;
use PDF;

class PlaystationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $page_title = 'Playstation Trade';
        $page_description = '';
        $currentUser = UserManagement::find(Auth::id());

        $partner = Partner::where('users_id', $currentUser->id)->first();

        $process_baru = SellPs::where([
            ['lokasi_trade', '=', $partner->id],
            ['status', '=', Helper::$baru]
        ])->get();

        $process_ps = SellPs::where([
            ['lokasi_trade', '=', $partner->id],
            ['status', '=', Helper::$process]
        ])->get();

        $process_tolak = SellPs::where([
            ['lokasi_trade', '=', $partner->id],
            ['status', '=', Helper::$tolak]
        ])->get();

        $process_rejected = SellPs::where([
            ['lokasi_trade', '=', $partner->id],
            ['status', '=', Helper::$rejected]
        ])->get();

        return view('pages.partner.content.playstation', compact('page_title', 'page_description', 'currentUser', 'process_baru', 'process_ps', 'process_tolak', 'process_rejected')); 
    }

    public function playstation_detail($id)
    {
        $page_title = 'Playstation Trade';
        $page_description = '';
        $currentUser = UserManagement::find(Auth::id());

        $ps_detail = SellPs::where('id', $id)->first();
        $lokasi = Partner::where('id', $ps_detail->lokasi_trade)->first();
        $voucher = Voucher::where('id', $ps_detail->voucher_id)->first();

        return view('pages.partner.content.playstation_detail', compact('page_title', 'page_description', 'currentUser', 'ps_detail', 'lokasi', 'voucher')); 

    }

    public function store($id, Request $request)
    {
        $data = $request->all();

        switch ($request->input('action')) {
            case 'process':
                $validator = Validator::make($data, [
                    'price' => 'required',
                ]);
        
                if ($validator->fails())
                {
                    return redirect()->route('ps-trade')->with(['error'=>'Data not valid.']);
                }
        
                $process = SellPs::where([
                    ['id', '=', $id]
                ])->first();
                if (!$process) {
                    return redirect()->route('ps-trade')->with(['error'=>'Invalid parameter id.']);
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
        
                return redirect()->route('ps-trade')->with(['success'=>'Process Berhasil.']);

                break;

            case 'rejected':
                $process = SellPs::where([
                    ['id', '=', $id]
                ])->first();
                if (!$process) {
                    return redirect()->route('ps-trade')->with(['error'=>'Invalid parameter id.']);
                }
                
                $process->price = $data['price'];
                $process->note = $data['note'];
                $process->status = Helper::$rejected;
                $process->save();
        
                return redirect()->route('ps-trade')->with(['success'=>'Reject Berhasil.']);

                break;
        }
    }

    public function generatePDF($id){

        $details = SellPs::where('id', $id)->first();

        if ($details->status == 1) {
        $ps_detail = SellPs::where('id', $id)->first();
        $lokasi = Partner::where('id', $ps_detail->lokasi_trade)->first();
        $voucher = Voucher::where('id', $ps_detail->voucher_id)->first();
        $data = [
            'nama_penerima' =>  $ps_detail->users->name,
            'alamat' => $ps_detail->users->address,
            'contact' => $ps_detail->users->contact, 
            'brand' =>  $ps_detail->brand,
            'type' => $ps_detail->type,
            'storages' => $ps_detail->storages,
            'penampilan_fisik' => $ps_detail->condition,
            'pilihan_tambahan' => $ps_detail->addition,
            'date' => date('d M Y')
        ];
           
        $pdf = PDF::loadView('pages.partner.content.pdf.pdf_ps', $data);
     
        return $pdf->download('surat_jalan_checker_'.$ps_detail->users->name.'.pdf');
        }

        elseif ($details->status == 2) {

        $ps_detail = SellPs::where('id', $id)->first();
        $lokasi = Partner::where('id', $ps_detail->lokasi_trade)->first();
        $voucher = Voucher::where('id', $ps_detail->voucher_id)->first();
        $data = [
            'nama_penerima' =>  $ps_detail->users->name,
            'alamat' => $ps_detail->users->address,
            'contact' => $ps_detail->users->contact, 
            'brand' =>  $ps_detail->brand,
            'type' => $ps_detail->type,
            'storages' => $ps_detail->storages,
            'penampilan_fisik' => $ps_detail->condition,
            'pilihan_tambahan' => $ps_detail->addition,
            'date' => date('d M Y')
        ];
           
        $pdf = PDF::loadView('pages.partner.content.pdf.pdf_ps_picker', $data);
     
        return $pdf->download('surat_jalan_picker_'.$ps_detail->users->name.'.pdf');
        }

    }
}
