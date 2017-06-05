<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Workgroup;
use App\Rating;
use App\Option;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wahl', [
            'ags' => Workgroup::all(),
            'ratings' => Rating::where('user', '=', Auth::user()->id)->orderBy('rating', 'desc')->get(),
            'options' => Option::find(1),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ags = Workgroup::all();

        $arr = [];

        foreach ($request->input('ag') as $key => $rating) {
            $arr[$rating] = (10 - $key > 0) ? (10 - $key) : 1;
        }

        $ratings = Rating::findByUser(Auth::user()->id);

        if ($ratings->count() > 0) {
            foreach ($ratings as $key => $rating) {

                DB::table('ratings')->where([
                    ['user', '=', Auth::user()->id],
                    ['workgroup', '=', $rating->workgroup]
                ])->update([
                    'rating' => $arr[$rating->workgroup],
                ]);
            }
        } else {
            foreach ($ags as $ag) {
                Rating::create([
                    'user' => Auth::user()->id,
                    'workgroup' => $ag->id,
                    'rating' => $arr[$ag->id],
                ]);
            }
        }
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
