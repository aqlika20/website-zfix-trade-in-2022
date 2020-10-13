<?php

namespace App\Http\Controllers\Content\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Site;

class SiteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $page_title = 'Site';
        $page_description = 'This is a Site Page';
        $sites = Site::all();

        return view('pages.managements.site.index', compact('page_title', 'page_description', 'sites'));

    }

    public function store(Request $request){

        $input = $request->all();

        $validator = Validator::make($input, [
            'req_name' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->with(['error' => 'Please fill all fields.']);
        }

        $name_exists = Site::where('name', $input['req_name'])->first();

        if($name_exists){
            return redirect()->back()->with(['error' => $input['req_name'].' already exists.'])->withInput($input);
        }

        $site = Site::create([
            'name' => strtoupper($input['req_name'])
        ]);

        return redirect()->back()->with(['success'=>'Site added.']);
    }


}
