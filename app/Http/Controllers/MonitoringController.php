<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Auth;
class MonitoringController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->is_admin === 1){
        $activity = Activity::with('user')->get();
        return view('monitoring', compact('activity'));
        } else {
            return redirect()->to('home');
        }
    }
}
