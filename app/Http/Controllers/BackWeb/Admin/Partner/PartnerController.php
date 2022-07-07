<?php

namespace App\Http\Controllers\BackWeb\Admin\Partner;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\BackWeb\Setting\UserManagement;
use App\BackWeb\Partner\Partner;
use App\BackWeb\SellLaptop;
use App\BackWeb\SellPhone;
use App\BackWeb\SellPs;
use App\BackWeb\SellTv;
use App\BackWeb\SellKulkas;
use App\BackWeb\SellMesinCuci;

use App\Helper;



class PartnerController extends Controller
{
    public function index() 
    {
        $currentUser = UserManagement::find(Auth::id());
        $page_title = 'Register New Partner';
        $page_description = '';
        $partners = Partner::all();
        return view('pages.admin.partner.partner', compact('page_title', 'page_description', 'currentUser', 'partners'));
    }

    public function create(Request $request) 
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'pic' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'partner_key' => 'required|string|max:255',

        ]);

        if ($validator->fails())
        {
            return redirect()->route('partner.index')->with(['error'=>'Data not valid.']);
        }
        
        $data['password'] = Hash::make($data['password']);
        $data['roles_id'] = '4'; 

        $users_id = UserManagement::create($data)->id;

        // if ($users_id < 10) {
        //     $data['partner_key'] = '0'.strval($users_id);
        // }
        // else {
        //     $data['partner_key'] = strval($users_id);
        // }
        
        $data['users_id'] = $users_id;

        Partner::create($data);

        return redirect()->route('partner.index')->with(['success'=>'Data created.']);
    }

    public function view($id) 
    {
        $currentUser = UserManagement::find(Auth::id());
        $page_title = 'Edit Register New Partner';
        $page_description = '';
        $partner = Partner::find($id);
        if (!$partner) {
            return redirect()->route('partner.index')->with(['error'=>'Invalid parameter id.']);
        }
        return view('pages.admin.partner.partner_edit', compact('page_title', 'page_description', 'currentUser', 'partner'));
    }

    public function edit($id, Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'pic' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails())
        {
            return redirect()->route('partner.index')->with(['error'=>'Data not valid.']);
        }

        $partner = Partner::where([
            ['id', '=', $id]
        ])->first();
        if (!$partner) {
            return redirect()->route('partner.index')->with(['error'=>'Invalid parameter id.']);
        }

        $user = UserManagement::where([
            ['id', '=', $partner->users_id]
        ])->first();

        $user->name = $data['name'];
        $partner->pic = $data['pic'];
        $partner->contact = $data['contact'];
        $partner->address = $data['address'];
        
        $user->save();
        $partner->save();

        return redirect()->route('partner.index')->with(['success'=>'Data edited.']);
    }

    public function delete($id) 
    {
        $partner = Partner::where([
            ['id', '=', $id]
        ])->first();
        if (!$partner) {
            return redirect()->route('partner.index')->with(['error'=>'Invalid parameter id.']);
        }

        Partner::where('id', $id)->delete();
        UserManagement::where('id', $partner->users_id)->delete();
        return redirect()->route('partner.index')->with(['success'=>'Data deleted.']);
    }

    public function tracking($id) 
    {
        $currentUser = UserManagement::find(Auth::id());
        $page_title = 'Tracking Patner';
        $page_description = '';
        
        // $patner = Partner::where([
        //     ['id', '=', $id]
        // ])->get();

        //handphone/tablet
        $hp_baru = SellPhone::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$baru]
        ])->get();

        $hp_process = SellPhone::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$process]
        ])->get();

        $hp_tolak = SellPhone::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$tolak]
        ])->get();

        $hp_rejected = SellPhone::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$rejected]
        ])->get();

        $hp_partner_claimed = SellPhone::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', 4]
        ])->get();

        //Laptop
        $laptop_baru = SellLaptop::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$baru]
        ])->get();

        $laptop_process = SellLaptop::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$process]
        ])->get();

        $laptop_tolak = SellLaptop::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$tolak]
        ])->get();

        $laptop_rejected = SellLaptop::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$rejected]
        ])->get();

        $laptop_partner_claimed = SellLaptop::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', 4]
        ])->get();

        //Televisi
        $tv_baru = SellTv::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$baru]
        ])->get();

        $tv_process = SellTv::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$process]
        ])->get();

        $tv_tolak = SellTv::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$tolak]
        ])->get();

        $tv_rejected = SellTv::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$rejected]
        ])->get();

        $tv_partner_claimed = SellTv::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', 4]
        ])->get();

        //Playstation
        $ps_baru = SellPs::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$baru]
        ])->get();

        $ps_process = SellPs::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$process]
        ])->get();

        $ps_tolak = SellPs::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$tolak]
        ])->get();

        $ps_rejected = SellPs::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$rejected]
        ])->get();

        $ps_partner_claimed = SellPs::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', 4]
        ])->get();

        //Kulkas
        $kulkas_baru = SellKulkas::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$baru]
        ])->get();

        $kulkas_process = SellKulkas::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$process]
        ])->get();

        $kulkas_tolak = SellKulkas::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$tolak]
        ])->get();

        $kulkas_rejected = SellKulkas::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$rejected]
        ])->get();

        $kulkas_partner_claimed = SellKulkas::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', 4]
        ])->get();

        //Mesin Cuci
        $mesin_cuci_baru = SellMesinCuci::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$baru]
        ])->get();

        $mesin_cuci_process = SellMesinCuci::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$process]
        ])->get();

        $mesin_cuci_tolak = SellMesinCuci::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$tolak]
        ])->get();

        $mesin_cuci_rejected = SellMesinCuci::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', Helper::$rejected]
        ])->get();

        $mesin_cuci_partner_claimed = SellMesinCuci::where([
            ['lokasi_trade', '=', $id],
            ['status', '=', 4]
        ])->get();

        return view('pages.admin.partner.partner_tracking', compact('page_title', 'page_description', 'currentUser', 'laptop_baru', 'laptop_process', 'laptop_tolak', 'laptop_rejected', 'tv_baru', 'tv_process', 'tv_tolak', 'tv_rejected', 'ps_baru', 'ps_process', 'ps_tolak', 'ps_rejected', 'laptop_partner_claimed', 'ps_partner_claimed', 'tv_partner_claimed', 'hp_baru', 'hp_process', 'hp_rejected', 'hp_tolak', 'hp_partner_claimed', 'kulkas_baru', 'kulkas_process', 'kulkas_rejected', 'kulkas_tolak', 'kulkas_partner_claimed', 'mesin_cuci_baru', 'mesin_cuci_process', 'mesin_cuci_rejected', 'mesin_cuci_tolak', 'mesin_cuci_partner_claimed'));
    }
}
