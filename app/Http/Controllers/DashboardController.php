<?php

namespace App\Http\Controllers;

use App\BackWeb\Setting\UserManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\BackWeb\Sell;
use App\User;
use DB;
use App\BackWeb\SellLaptop;
use App\BackWeb\SellPs;
use App\BackWeb\SellTv;
use App\BackWeb\SellPhone;
use App\BackWeb\SellKulkas;
use App\BackWeb\SellMesinCuci;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = '';
        $currentUser = User::find(Auth::id());
        // $sells = Sell::get();
        $count_laptop = SellLaptop::where('status', 1)->count();
        $count_ps = SellPs::where('status', 1)->count();
        $count_tv = SellTv::where('status', 1)->count();
        $count_hp = SellPhone::where('status', 1)->count();
        $count_kulkas = SellKulkas::where('status', 1)->count();
        $count_mesin_cuci = SellMesinCuci::where('status', 1)->count();

        return view('pages.dashboard', compact('page_title', 'page_description', 'currentUser', 'count_laptop', 'count_ps', 'count_tv', 'count_hp', 'count_kulkas', 'count_mesin_cuci'));
    }

    public function Counting(){
        $count_laptop = SellLaptop::where('status', 1)->count();
        $count_ps = SellPs::where('status', 1)->count();
        $count_tv = SellTv::where('status', 1)->count();
        $count_hp = SellPhone::where('status', 1)->count();
        $count_kulkas = SellKulkas::where('status', 1)->count();
        $count_mesin_cuci = SellMesinCuci::where('status', 1)->count();

        $data = [
            'laptop' => $count_laptop,
            'ps' => $count_ps,
            'tv' => $count_tv,
            'hp' => $count_hp,
            'kulkas' => $count_kulkas,
            'mesin_cuci' => $count_mesin_cuci,
        ];
            return response()->json(['data' => $data], 200);
    }
}
