<?php

namespace App\Http\Controllers;

use Validator;
use App\Mail\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class MailController extends Controller
{
    /**
     * Send Contact mail to the e-mail adress placed in .env-file
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
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

            Log::info(config('mail.username'));

            Mail::to(config('mail.username'))->send(new UserContact($request));
            return response()->json(['success' => true]);
        } else return redirect()->back();
    }
}
