<?php

namespace App\Http\Controllers\BackWeb\Partner\Content;

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
        $currentUser = User::find(Auth::id());
        
        $partner = Partner::where('users_id', $currentUser->id)->first();

        $process_baru = SellLaptop::where([
            ['lokasi_trade', '=', $partner->id],
            ['status', '=', Helper::$baru]
        ])->get();

        $process_laptop = SellLaptop::where([
            ['lokasi_trade', '=', $partner->id],
            ['status', '=', Helper::$process]
        ])->get();

        $process_tolak = SellLaptop::where([
            ['lokasi_trade', '=', $partner->id],
            ['status', '=', Helper::$tolak]
        ])->get();

        $process_rejected = SellLaptop::where([
            ['lokasi_trade', '=', $partner->id],
            ['status', '=', Helper::$rejected]
        ])->get();

        return view('pages.partner.content.laptop', compact('page_title', 'page_description', 'currentUser', 'process_baru', 'process_laptop', 'process_tolak', 'process_rejected'));
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

        return view('pages.partner.content.laptop_detail', compact('page_title', 'page_description', 'currentUser', 'laptop_detail', 'lokasi', 'voucher')); 

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

        
        }
    }

    public function generatePDF($id){
        
        $details = SellLaptop::where('id', $id)->first();

        if ($details->status == 1) {

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
           
        $pdf = PDF::loadView('pages.partner.content.pdf.pdf_laptop', $data);
     
        return $pdf->download('surat_jalan_checker_'.$laptop_detail->users->name.'.pdf');
        }

        elseif ($details->status == 2) {
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
           
        $pdf = PDF::loadView('pages.partner.content.pdf.pdf_laptop_picker', $data);
     
        return $pdf->download('surat_jalan_picker_'.$laptop_detail->users->name.'.pdf');
        }

        

    }
}
