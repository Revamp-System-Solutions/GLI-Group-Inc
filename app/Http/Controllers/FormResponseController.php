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

        // Mail::to('forms_response@gligroupinc.com')->send(new NotifyMail());

        // if (Mail::failures()) {
        //     return response()->Fail('Sorry! Please try again latter');
        // } else {

        // }
        return Inertia::location('/thank-you');
    }
}