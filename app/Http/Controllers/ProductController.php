<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


class ProductController extends Controller
{
    public function index(){
        $device = Product::get();
        
        return response()->json($device);
    }
}
