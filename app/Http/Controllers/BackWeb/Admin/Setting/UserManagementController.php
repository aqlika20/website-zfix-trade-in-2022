<?php

namespace App\Http\Controllers\BackWeb\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BackWeb\Setting\UserManagement;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Helper;

class UserManagementController extends Controller
{
    public function index() 
    {
        $currentUser = UserManagement::find(Auth::id());
        $page_title = 'User Management';
        $page_description = '';
        $users = UserManagement::where([
            ['roles_id', '!=', 4],
            ['roles_id', '!=', 5]
        ])->get();
        return view('pages.admin.settings.user_management', compact('page_title', 'page_description', 'currentUser', 'users'));
    }

    public function create(Request $request) 
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles_id' => 'required|numeric'
        ]);

        if ($validator->fails())
        {
            return redirect()->route('user-management.index')->with(['error'=>'Data not valid1.']);
        }
        else if (empty(Role::find($data['roles_id'])))
        {
            return redirect()->route('user-management.index')->with(['error'=>'Data not valid2.']);
        }
        else if ($data['roles_id'] == '4')
        {
            return redirect()->route('user-management.index')->with(['error'=>'Data not valid3.']);
        }

        $data['password'] = Hash::make($data['password']);

        UserManagement::create($data);
        return redirect()->route('user-management.index')->with(['success'=>'Data created.']);
    }

    public function view($id) 
    {
        $currentUser = UserManagement::find(Auth::id());
        $page_title = 'Edit User Management';
        $page_description = '';
        $user = UserManagement::find($id);
        if (!$user) {
            return redirect()->route('user-management.index')->with(['error'=>'Invalid parameter id.']);
        }
        return view('pages.admin.settings.user_management_edit', compact('page_title', 'page_description', 'currentUser', 'user'));
    }

    public function edit($id, Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'roles_id' => 'required|numeric'
        ]);

        if ($validator->fails())
        {
            return redirect()->route('user-management.index')->with(['error'=>'Data not valid.']);
        }
        else if (empty(Role::find($data['roles_id'])))
        {
            return redirect()->route('user-management.index')->with(['error'=>'Data not valid.']);
        }
        else if ($data['roles_id'] == '4')
        {
            return redirect()->route('user-management.index')->with(['error'=>'Data not valid.']);
        }

        $user = UserManagement::where([
            ['id', '=', $id]
        ])->first();
        if (!$user) {
            return redirect()->route('user-management.index')->with(['error'=>'Invalid parameter id.']);
        }

        $user->name = $data['name'];
        $user->roles_id = $data['roles_id'];

        $user->save();

        return redirect()->route('user-management.index')->with(['success'=>'Data edited.']);
    }

    public function delete($id) 
    {
        $user = UserManagement::where([
            ['id', '=', $id]
        ])->first();
        if (!$user) {
            return redirect()->route('user-management.index')->with(['error'=>'Invalid parameter id.']);
        }
        UserManagement::where('id', $id)->delete();
        return redirect()->route('user-management.index')->with(['success'=>'Data deleted.']);
    }
}
