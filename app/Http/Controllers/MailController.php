<?php

namespace App\Http\Controllers;

use Validator;
use App\Mail\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class MailController extends Controller
{
    public function send(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'lastname' => 'required',
                'email' => 'required|email',
                'message' => 'required',
            ]);

            if ($validator->fails())
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()->all(),
                ]);

            Mail::to(env('MAIL_USERNAME'))->send(new UserContact($request));
            return response()->json(['success' => true]);
        } else return redirect()->back();
    }
}
