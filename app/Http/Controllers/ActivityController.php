<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\User;
use Auth;
class Activitycontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = User::with('overtime')->where('id', Auth::user()->id)->first();
        return view('activity.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities = User::with('overtime')->where('id', Auth::user()->id)->first();
        return view('activity.create', compact('activities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activities             = new Activity;
        $activities->id_user    = Auth::user()->id;
        $activities->day_date   = $request->day_date;
        $activities->start      = $request->start;
        $activities->finish     = $request->finish;
        $activities->activity   = $request->activity;
        $activities->location   = $request->location;
        $activities->save();
        activity()->log('menambahkan activity');
        return redirect('activity');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::with('overtime')->where('id', Auth::user()->id)->first();
        $activities = Activity::find($id);
        return view('activity.edit', compact('activities','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $activities             = Activity::find($id);
        $activities->day_date   = $request->day_date;
        $activities->start      = $request->start;
        $activities->finish     = $request->finish;
        $activities->activity   = $request->activity;
        $activities->location   = $request->location;
        $activities->save();
        activity()->log('merubah activity');
        return redirect('activity');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activities = Activity::find($id);
        $activities->delete();
        activity()->log('menghapus activity');
        return redirect('activity');
    }
}
