<?php

namespace App\Http\Controllers;

use App\Models\FormResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FormResponseController extends Controller
{
    public function sendMessage(Request $request)
    {
        $formResponse = new FormResponse();

        $formResponse->title = "New form submission";
        $formResponse->response = json_encode($request->all());

        $formResponse->save();

        $request->session()->flash('success', 'New form has been added|>><<|Form successfully saved!');
    }
}
