<?php

namespace App\Http\Controllers;

use Validator;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Workgroup;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        if (is_null($id)) {
            if (Auth::user()->userlevel > 0)
                return redirect('/redirect');
            return view('dashboard', [
                'user' => Auth::user(),
                'ratings' => Rating::where('user', '=', Auth::user()->id)->orderBy('rating', 'desc')->get(),
                'ags' => Workgroup::all(),
                'result' => Workgroup::find(Auth::user()->zugewiesen),
            ]);
        }
        return view('dashboard', [
            'user' => User::find($id),
            'ratings' => Rating::where('user', '=', User::find($id)->id)->orderBy('rating', 'desc')->get(),
            'ags' => Workgroup::all(),
            'options' => Option::find(1),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null)
    {
        if (is_null($id))
            return view('edit_user')->with(['user' => Auth::user()]);
        else
            return view('edit_user')->with(['user' => User::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Validation\Validator $validator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Validator $validator)
    {
        $user = User::find(intval(Auth::user()->id));

        if ($request->name != $user->name && $request->name != "")
            $user->name = $request->name;
        if ($request->lastname != $user->lastname && $request->lastname != "")
            $user->lastname = $request->lastname;
        if ($request->matnr != $user->matrnr && $request->matnr != "")
            $user->matrnr = $request->matnr;
        if ($request->email != $user->email && $request->email != "")
            $user->email = $request->email;

        /*
         * if the user want's to change his password.
         */

        if ($request->password != "" || $validator->fails()) {

            if (bcrypt($request->passwordold) != $user->password)
                return redirect('/profile/edit');

            if ($request->password != $user->password)
                $user->password = bcrypt($request->password);

        }

        $user->save();

        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
    }

    /**
     * Stores the sent user image and updates the current user-table.
     *
     * @param Request $request
     */
    public function storeUpload(Request $request)
    {
        Log::info('Filename: ' . $request->file('file')->getClientOriginalName());

        $user = User::find(Auth::user()->id);

        $img = $request->file('file');
        $imgName = time() . $user->name . $user->lastname . "." . $img->getClientOriginalName();
        $img->move(public_path('img/uploads'), $imgName);

        $user->user_picture = $imgName;
        $user->update();
    }

}
