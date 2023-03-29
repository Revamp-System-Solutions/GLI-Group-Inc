<?php

namespace App\Http\Controllers;

use App\Models\FormResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

use Mail;

use App\Mail\NotifyMail;

class FormResponseController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->except(["sendMessage"]);
    }

    public function sendMessage(Request $request)
    {


        $formResponse = new FormResponse();

        $formResponse->title = $request->formTitle;
        $formResponse->response = json_encode($request->all());

        $formResponse->save();
        Mail::to($request->email)->send(new NotifyMail());
        // Mail::to('forms_response@rvmpsolutions.net')->send(new NotifyMail());
        if (Mail::failures()) {            
            return response()->json(['errors' => 'Failed to Sumbit Response! Try Again!']);
            // return response()->Fail('Sorry! Please try again latter');
        } else {
            $request->session()->flash('success','Email sent to '.$request->email.'|>><<|Email successfully sent!');
            // return response()->json(['success'=>'Email sent to '.$request->email.'|>><<|Email successfully sent!']);
            return redirect()->route($request->formTitle==='get-in-touch'?'guest.thankYou':'guest.index')
            ->with('success', 'Email sent to '.$request->email.'|>><<|Email successfully sent!');
        }
    }
}