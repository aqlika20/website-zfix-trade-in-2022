<?php

namespace App\Http\Controllers\BackWeb\Partner\Content;

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

class TelevisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // public function index()
    // {
    //     $page_title = 'Televisi Trade';
    //     $page_description = '';
    //     $currentUser = UserManagement::find(Auth::id());
        
    //     $partner = Partner::where('users_id', $currentUser->id)->first();

    //     $process_baru = SellTv::where([
    //         ['lokasi_trade', '=', $partner->id],
    //         ['status', '=', Helper::$baru]
    //     ])->get();

    //     $process_tv = SellTv::where([
    //         ['lokasi_trade', '=', $partner->id],
    //         ['status', '=', Helper::$process]
    //     ])->get();

    //     $process_tolak = SellTv::where([
    //         ['lokasi_trade', '=', $partner->id],
    //         ['status', '=', Helper::$tolak]
    //     ])->get();

    //     $process_rejected = SellTv::where([
    //         ['lokasi_trade', '=', $partner->id],
    //         ['status', '=', Helper::$rejected]
    //     ])->get();

    //     return view('pages.partner.content.televisi', compact('page_title', 'page_description', 'currentUser', 'process_baru', 'process_tv', 'process_tolak', 'process_rejected')); 
    // }

    public function televisi_detail($id)
    {
        $page_title = 'Televisi Trade';
        $page_description = '';
        $currentUser = UserManagement::find(Auth::id());

        $tv_detail = SellTv::where('id', $id)->first();
        $lokasi = Partner::where('id', $tv_detail->lokasi_trade)->first();
        $voucher = Voucher::where('id', $tv_detail->voucher_id)->first();

        return view('pages.partner.content.televisi_detail', compact('page_title', 'page_description', 'currentUser', 'tv_detail', 'lokasi', 'voucher')); 

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
                $process->status = 2;
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

        
        }
    }

    public function generatePDF($id){

        $details = SellTv::where('id', $id)->first();

        if ($details->status == 1) {

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
            'layar_dalam' => $tv_detail->inner_screen,
            'layar_luar' => $tv_detail->outer_screen,
            'penampilan_fisik' => $tv_detail->condition,
            'pilihan_tambahan' => $tv_detail->addition,
            'date' => date('d M Y')
        ];
           
        $pdf = PDF::loadView('pages.partner.content.pdf.pdf_tv', $data);
     
        return $pdf->download('surat_jalan_checker_'.$tv_detail->users->name.'.pdf');
        }

        elseif ($details->status == 2) {
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
            'layar_dalam' => $tv_detail->inner_screen,
            'layar_luar' => $tv_detail->outer_screen,
            'penampilan_fisik' => $tv_detail->condition,
            'pilihan_tambahan' => $tv_detail->addition,
            'date' => date('d M Y')
        ];
           
        $pdf = PDF::loadView('pages.partner.content.pdf.pdf_tv_picker', $data);
     
        return $pdf->download( 'surat_jalan_picker_'.$tv_detail->users->name.'.pdf');
        }

    }

}
