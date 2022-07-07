<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BackWeb\Setting\UserManagement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function detail(){
        if(Auth::check()){
            
            $user = UserManagement::where('id', Auth::id())->first();

            $data = [
                'user' => $user,
            ];

            return response()->json(['data' => $data], 200);
        }
    }

    public function edit(Request $request)
    {
        if(Auth::check()){

            $data = $request->all();

            $validator = Validator::make($data, [
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'contact' => 'required|string|max:255',
            ]);
            

            if ($validator->fails())
            {
                return response()->json([
                    'messages' => $validator->errors()
                ], 400);
            }

            $user = UserManagement::where([
                ['id', '=', Auth::id()]
            ])->first();

            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->contact = $data['contact'];
            $user->email = $data['email'];
            $user->save();
                  

            return response()->json(['success'], 201);
        }
    } 
}
