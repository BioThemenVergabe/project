<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Workgroup;
use App\Rating;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wahl', ['ags' => Workgroup::all(), 'ratings' => Rating::findByUser(Auth::user()->id)]);
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

        return response()->json($request->input('ag'));

        $ratings = Rating::findByUser(Auth::user()->id);

        if (count($ratings) > 0) {
            foreach ($ratings as $rating) {
                DB::table('ratings')->where([
                    ['user','=',Auth::user()->id],
                    ['workgroup','=',$rating->workgroup]
                ])->update([
                    'rating' => $request->input('ag-'.$rating->workgroup),
                ]);
            }
        } else {
            foreach ($ags as $ag) {
                Rating::create([
                    'user' => Auth::user()->id,
                    'workgroup' => $ag->id,
                    'rating' => $request->input('ag-' . $ag->id),
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
