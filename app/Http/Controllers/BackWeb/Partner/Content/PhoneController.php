<?php

namespace App\Http\Controllers\BackWeb\Partner\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BackWeb\Setting\UserManagement;

use App\User;

class PhoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $page_title = 'Phone Sell';
        $page_description = '';
        $currentUser = User::find(Auth::id());
        // $sells = Sell::get();
       
        return view('pages.partner.content.phone', compact('page_title', 'page_description', 'currentUser'));
    }
}
