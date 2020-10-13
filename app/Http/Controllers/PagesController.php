<?php

namespace App\Http\Controllers;

use App\BackWeb\Setting\UserManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = '';

        return view('pages.dashboard', compact('page_title', 'page_description'));
    }

}
