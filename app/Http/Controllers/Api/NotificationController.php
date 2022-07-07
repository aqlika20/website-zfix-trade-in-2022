<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BackWeb\Setting\Notification;
use Illuminate\Support\Facades\Auth;
use App\BackWeb\Setting\UserManagement;
use DB;

class NotificationController extends Controller
{
    public function index(){
        if(Auth::check()){
            $notif = Notification::where([
                ['customers_id', '=', Auth::id()],
                ])->orderBy('id', 'desc')->get();

            $count_notif = Notification::where([
                ['customers_id', '=', Auth::id()],
                ['read', '=', 0] 
                ])->count();

            return response()->json(['data' => $notif, 'count' => $count_notif], 200);

        }
    }

    public function ReadNotif(){

        $user = UserManagement::where('id', Auth::id())->first();

        DB::table('notification')->where('customers_id', '=', $user->id)->update(['read' => 1]);

        return response()->json(['success'], 201);
    }
}
