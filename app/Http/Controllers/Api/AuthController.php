<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Password;

use Carbon\Carbon;

use App\User;

class AuthController extends Controller
{
    
    private $auth_token_key = 'zfix-auth-token';

    public function loginForPartner(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid login credentials.'], 401);
        }

        $user = Auth::user();
        if ($user->roles_id != 4) {
            return response()->json(['message' => 'Restricted login credentials.'], 401);
        }
        
        $access_token = $user->createToken($this->auth_token_key)->accessToken;

        $data = [
            'access_token' => $access_token
        ];

        return response()->json(['data' => $data], 200);
    }

    public function loginForCustomer(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid login credentials.'], 401);
        }

        $user = Auth::user();
        if ($user->roles_id != 5) {
            return response()->json(['message' => 'Restricted login credentials.'], 401);
        }
        
        $access_token = $user->createToken($this->auth_token_key)->accessToken;

        $data = [
            'user' => $user,
            'access_token' => $access_token
        ];

        return response()->json(['data' => $data], 200);
    }

    public function register(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required|string',
            'address' => 'required|string',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'external_user_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        //check if the inputted email is already exists in database.
        $email_exists = User::where('email', $input['email'])->first();

        
        if($email_exists){
            return response()->json([
                'message' => 'The email has already been taken.'
            ], 401); 
        }

        // //check if the inputted name is already exists in database.
        // $name_exists = User::where('name', $input['name'])->first();

        // if($name_exists){
        //     return response()->json([
        //         'message' => 'The name has already been taken.'
        //     ], 401); 
        // }

        //encrypt password before inserting to database.
        $input['password'] = bcrypt($input['password']);

        //roles_id
        $input['roles_id'] = 5;

        $user = User::create($input);
        $access_token = $user->createToken($this->auth_token_key)->accessToken;

        $data = [
            'user' => $user,
            'access_token' => $access_token,
        ];

        return response()->json(['data' => $data], 200);
    }

    public function passwordEmail(Request $request) {
        $input = $request->all();

        $validator = Validator::make($input, [
            'email' => 'required|email'
        ]);

        if($validator->fails()){
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        $user = User::where('email',$input['email'])->first();

        if (!$user) {
            return response()->json([
                'message' => 'No account with that email address.'
            ], 404); 
        }

        Password::sendResetLink($input);

        return response()->json(['success'], 201);
    }

    public function passwordReset(Request $request) {
        $input = $request->all();

        $validator = Validator::make($input, [
            'token' => 'required|string',
            'password' => 'required|min:6',
            'c_password' => 'required|same:password'
        ]);

        if($validator->fails()){
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        $reset_password_status = Password::reset($input, function ($user, $password) {
            $user->password = $password;
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return response()->json(['message' => 'Invalid token provided.'], 400);
        }

        return response()->json(['success'], 201);
    }

}
