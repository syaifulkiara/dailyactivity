<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\User;
use Auth;
class PrintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $activities = User::with('overtime')->where('id', Auth::user()->id)->first();
        return view('activity.print', compact('activities'));
    }
}
