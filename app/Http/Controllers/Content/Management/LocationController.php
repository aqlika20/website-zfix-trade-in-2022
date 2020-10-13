<?php

namespace App\Http\Controllers\Content\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Site;
use App\Location;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $page_title = 'Location';
        $page_description = 'This is a Location Page';
        $sites = Site::all();
        $locations = Location::all();

        return view('pages.managements.location.index', compact('page_title', 'page_description', 'sites', 'locations'));

    }

    public function store(Request $request){
        
        $input = $request->all();

        $validator = Validator::make($input, [
            'req_site' =>'required',
            'req_name' => 'required',
            'req_pic' => 'required',
            'req_pic_number' => 'required|numeric',
            'req_address' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->with(['error' => 'Please fill all fields!'])->withInput($input);
        }


        $location_exists = Location::where([
            ['sites_id' , '=', $input['req_site']],
            ['name', '=', $input['req_name']],
        ])->first();

        if($location_exists){
            return redirect()->back()->with(['error' => $input['req_name'] . ' already exists.'])->withInput($input);
        }

        $location = Location::create([
            'sites_id' => $input['req_site'],
            'name' => strtoupper($input['req_name']),
            'pic' => $input['req_pic'],
            'pic_number' => $input['req_pic_number'],
            'address' => $input['req_address']
        ]);

        return redirect()->back()->with(['success' => 'Location added.']);

    }

    //only in JSON Form
    public function getLocationsBySite($site_id){
        if(empty($site_id)){
            return response()->json(['message' => 'Data not found.'], 404);
        }

        $locations = Location::where('sites_id', $site_id)->get();

        if(!$locations){
            return response()->json(['message' => 'Data not found.'], 404);
        }

        $data = [];

        foreach($locations as $location){
            $data[] = [
                'id' => $location->id,
                'name' => $location->name
            ];
        }

        return response()->json(['data' => $data], 200);
    }
}
