<?php

namespace App\Http\Controllers\Content\Settings\privilege;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Privilege;

class PrivilegeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $page_title = 'Access';
        $page_description = 'This is a Access Page';
        $users = User::all();
        $privileges = Privilege::all();

        return view('pages.settings.privilege.index', compact('page_title', 'page_description', 'users', 'privileges'));
    }

    public function store(Request $request){
        $input = $request->all();

        $validator = Validator::make ($input, [
            'req_name'=>'required',
            'req_email'=>'required|email',
            'req_password'=>'required',
            'req_confirm_password'=>'required|same:req_password',
            'req_privilege'=>'required|numeric'
        ]);

        if($validator->fails()){
            return redirect()->back()->with(['error'=>'Mohon isi semua data!!']);
        }

        $name_exists = User::where('name', $input['req_name'])->first();
        if($name_exists){
            return redirect()->back()->with(['error'=>'Nama '.$input['req_name'].' Sudah Terdaftar']);
        }

        $email_exists = User::where('email', $input['req_email'])->first();
        if($email_exists){
            return redirect()->back()->with(['error'=>'Email '.$input['req_email'].' Sudah Terdaftar']);
        }

        $privilege_available = Privilege::where('id', $input['req_privilege'])->first();
        if(!$privilege_available){
            return redirect()->back()->with(['error'=>'privilege Tidak Ditemukan.']);
        }

        $user = User::create([
            'name'=>$input['req_name'],
            'email'=>$input['req_email'],
            'password'=>Hash::make($input['req_password']),
            'privileges_id'=>$input['req_privilege']
        ]);

        return redirect()->back()->with(['success'=>'Access Berhasil Di Input']);
    }
}
