<?php

namespace App\Http\Controllers\BackWeb\Admin\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\BackWeb\SellTv;
use App\BackWeb\SellLaptop;
use App\BackWeb\SellPs;
use App\BackWeb\SellKulkas;
use App\BackWeb\SellMesinCuci;
use App\BackWeb\Setting\UserManagement;
use App\BackWeb\Setting\Invoice;
use App\Helper;
use App\BackWeb\Partner\Partner;
use App\BackWeb\Partner\Voucher;
use Illuminate\Support\Facades\Validator;
use PDF;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $method = $request->method();
        $page_title = 'Invoice';
        $page_description = '';
        $currentUser = UserManagement::find(Auth::id());

        $partner = Partner::where('users_id', $currentUser->id)->first();

        if ($request->isMethod('post'))
        {
            $from = $request->input('from_date');
            $to   = $request->input('to_date');

            if ($request->has('exportPDF'))
            {
                // select PDF
               $process_selesai_ps = SellPs::where([
                ['lokasi_trade', '=', $partner->id],
                ['status', '=', Helper::$selesai],
            ])->whereBetween('created_at', [$from, $to])->get();

            $process_selesai_tv = SellTv::where([
                ['lokasi_trade', '=', $partner->id],
                ['status', '=', Helper::$selesai],
            ])->whereBetween('created_at', [$from, $to])->get();

            $process_selesai_laptop = SellLaptop::where([
                ['lokasi_trade', '=', $partner->id],
                ['status', '=', Helper::$selesai]
            ])->whereBetween('created_at', [$from, $to])->get();

            $process_selesai_kulkas = SellKulkas::where([
                ['lokasi_trade', '=', $partner->id],
                ['status', '=', Helper::$selesai]
            ])->whereBetween('created_at', [$from, $to])->get();

            $process_selesai_mesin_cuci = SellMesinCuci::where([
                ['lokasi_trade', '=', $partner->id],
                ['status', '=', Helper::$selesai]
            ])->whereBetween('created_at', [$from, $to])->get();

            $nomor_invoices = Invoice::where([
                ['partner_id', '=', $partner->id]
            ])->first();
    
            if ($nomor_invoices === null) {
                $data['partner_id'] = $partner->id;
                $data['nomor_invoice'] = 0;
    
                Invoice::create($data);
            }
    
            $nomor_urut = $nomor_invoices->nomor_invoice + 1;
            $number = mt_rand(000000, 999999);
            $tanggal = Carbon::now()->format('d-M-Y');
            $year = Carbon::now()->format('Y');
            $month = Carbon::now()->format('m');
    
            $pdf = PDF::loadView('pages.admin.content.pdf.invoice2', ['process_selesai_ps'=>$process_selesai_ps,'process_selesai_tv'=>$process_selesai_tv,'process_selesai_laptop'=>$process_selesai_laptop, 'process_selesai_kulkas'=>$process_selesai_kulkas, 'process_selesai_mesin_cuci'=>$process_selesai_mesin_cuci, 'currentUser'=>$currentUser, 'number' => $number, 'tanggal' => $tanggal, 'year'=>$year, 'month'=>$month, 'nomor_urut'=>$nomor_urut]);
         
            $nomor_invoices->nomor_invoice = $nomor_invoices->nomor_invoice + 1;
            $nomor_invoices->save();
        
            return $pdf->download( 'invoice.pdf');

            }
        }
            else
        {
            $process_selesai_ps = SellPs::where([
                ['lokasi_trade', '=', $partner->id],
                ['status', '=', Helper::$selesai]
            ])->get();
    
            $process_selesai_tv = SellTv::where([
                ['lokasi_trade', '=', $partner->id],
                ['status', '=', Helper::$selesai]
            ])->get();
    
            $process_selesai_laptop = SellLaptop::where([
                ['lokasi_trade', '=', $partner->id],
                ['status', '=', Helper::$selesai]
            ])->get();
    
            $process_selesai_kulkas = SellKulkas::where([
                ['lokasi_trade', '=', $partner->id],
                ['status', '=', Helper::$selesai]
            ])->get();
    
            $process_selesai_mesin_cuci = SellMesinCuci::where([
                ['lokasi_trade', '=', $partner->id],
                ['status', '=', Helper::$selesai]
            ])->get();
    
            return view('pages.admin.content.invoice', compact('page_title', 'page_description', 'currentUser', 'process_selesai_ps', 'process_selesai_tv', 'process_selesai_laptop', 'process_selesai_kulkas', 'process_selesai_mesin_cuci')); 
        }
    

        
    }
}
