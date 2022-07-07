<?php

namespace App\Http\Controllers\BackWeb\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $currentUser = User::find(Auth::id());
        $page_title = 'Partner | Home';
        $page_description = 'Home';

        return view('pages.partner.home', compact('page_title', 'page_description', 'currentUser'));
    }
}
