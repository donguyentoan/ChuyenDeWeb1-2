<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index()
    {
        return view('Contact.contact');
    }

    public function contact_cus(Request $request)
    {

        $request->validate([
            'fullname' => ['required', 'string'],
            'phone' => ['required', 'digits:10'],
            'email' => ['required', 'email', 'string'],
            'subject' => ['required', 'string'],
            'content' => ['required', 'string'],
        ]);

        $recipientEmail = 'donguyentoan2003@gmail.com';
        
        $content = $request->content . '     Email :' . $request->email . '     Phone : '. $request->phone;

        Mail::raw($content, function ($email) use ($recipientEmail, $request) {
            $email->to($recipientEmail , $request->fullname)
                ->subject($request->subject)
                ->from($request->email, $request->fullname);
        });

        return redirect('/contact')->with('success', 'Mail delivery success');

       

    }
}
