<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mails;

class EmailController extends Controller
{
    public function Email(Request $request)
    {
        // $details = [
        //     'title' => 'Mail from ItSolutionStuff.com',
        //     'body' => 'This is for testing email using smtp'
        // ];
       
        // Mail::to('aqlika05@gmail.com')->send(new Mails($details));
        // Mail::to("ahmadardianto18@gmail.com")->send(new Mails($details));

        \Mail::send('mail',
        array(
            'email' => $request->get('email'),
            
        ), function($message) use ($request)
          {
             $message->from('aqlika05@gmail.com');
             $message->to('ardi@macantech.asia')->subject('Contact US');
          });


        echo "Successfully sent the email";
      
    }
}
