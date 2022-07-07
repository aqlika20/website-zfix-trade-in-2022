<?php

namespace App\Http\Controllers\BackWeb\Partner\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\BackWeb\SellTv;
use App\BackWeb\SellLaptop;
use App\BackWeb\SellPs;
use App\BackWeb\Setting\UserManagement;
use App\Helper;
use App\BackWeb\Partner\Partner;
use App\BackWeb\Partner\Voucher;
use Illuminate\Support\Facades\Validator;
use PDF;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page_title = 'Invoice';
        $page_description = '';
        $currentUser = UserManagement::find(Auth::id());

        $partner = Partner::where('users_id', $currentUser->id)->first();

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

        

        return view('pages.partner.content.playstation', compact('page_title', 'page_description', 'currentUser', 'process_selesai_ps', 'process_selesai_tv', 'process_selesai_laptop')); 
    }
}
