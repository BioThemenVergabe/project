<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Option;
use App\Rating;
use App\Workgroup;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Hash;

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
            $user = Auth::user();
            return view('dashboard', [
                'user' => $user,
                'ratings' => Rating::where('user', '=', Auth::user()->id)->orderBy('rating', 'desc')->get(),
                'ags' => Workgroup::all(),
                'result' => Workgroup::find(Auth::user()->zugewiesen),
                'options' => Option::find(1),
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
        if(Option::find(1)->opened == 0)
            return redirect()->back();

        if (is_null($id))
            return view('edit_user')->with([
                'user' => Auth::user(),
                'options' => Option::find(1),
            ]);
        else
            return view('edit_user')->with([
                'user' => User::find($id),
                'options' => Option::find(1),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Validation\Validator $validator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'confirmed|min:8|different:passwordold',
            'password_confirmation' => 'required_with:password|min:8',
            'email' => 'uniqueUsers|email',
            'matrnr' => 'uniqueUsers',
        ]);
        $user = User::find(intval(Auth::user()->id));
        if ($request->name != $user->name && $request->name != "")
            $user->name = $request->name;
        if ($request->lastname != $user->lastname && $request->lastname != "")
            $user->lastname = $request->lastname;
        if ($request->matrnr != $user->matrnr && $request->matrnr != "")
            $user->matrnr = $request->matrnr;
        if ($request->email != $user->email && $request->email != "")
            $user->email = $request->email;
        /*
         * if the user want's to change his password.
         */
        if ($validator->fails())
            return redirect('/profile/edit')->withErrors($validator)->withInput();
        if ($request->password != "" && Hash::check($request->passwordold, $user->password)) {
            $user->password = Hash::make($request->password);
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

}
