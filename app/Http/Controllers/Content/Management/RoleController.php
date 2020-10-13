<?php

namespace App\Http\Controllers\Content\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Role;
use App\Site;
use App\Location;

class RoleController extends Controller
{
    private $allowed_site_ids;
    private $allowed_location_ids;

    public function __construct()
    {
        $this->allowed_site_ids = Site::pluck('id')->toArray();
        $this->allowed_location_ids = Location::pluck('id')->toArray();
        $this->middleware('auth');
    }

    public function index(){
        $page_title = 'Role Management';
        $page_description = 'This is a Role Management page';
        $roles = Role::all();
        $sites = Site::all();
        $locations = Location::all();

        return view('pages.managements.role.index', compact('page_title', 'page_description', 'roles', 'sites', 'locations'));
    }

    public function store(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [
            'req_site' => [
                'required',
                Rule::in($this->allowed_site_ids)
            ],
            'req_location' => [
                'required',
                Rule::in($this->allowed_location_ids)
            ],
            'req_name'=>"required",
            'req_rate'=>"required|numeric",
            'req_overtime'=>"required|numeric",
            'req_quarantine'=>"required|numeric"
        ]);

        if($validator->fails()){
            return redirect()->back()->with(['error'=>'Please fill in all data!!']);
        }

        $name_exists = Role::where('name', $input['req_name'])->first();
        if($name_exists){
            return redirect()->back()->with(['error'=>'Role Name'.$input['req_name'].' Already Registered'])->withInput($input);
        }

        $role = Role::create([
            'sites_id'=>$input['req_site'],
            'locations_id'=>$input['req_location'],
            'name'=>strtoupper($input['req_name']),
            'rate_hour'=>$input['req_rate'],
            'rate_overtime'=>$input['req_overtime'],
            'rate_quarantine'=>$input['req_quarantine']
        ]);

        return redirect()->back()->with(['success'=>'Role Success Added!!!']);

    }
        
}
