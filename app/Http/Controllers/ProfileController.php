<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Auth;
use Hash;
class ProfileController extends Controller
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
        $users = User::where('id', Auth::user()->id)->first();
        return view('profile.index', compact('users'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $users = User::find($id);
        return view('profile.edit', compact('users'));
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
        $users = User::find($id);
         $users->name = $request->name;
         if($request->file('avatar')) {
             $file = $request->file('avatar');
             $avatarname = time().str_replace(" ", "", $file->getClientOriginalName());
             $file->move('public/images/avatar', $avatarname);

             File::delete(public_path($users->avatar));
             $users->avatar = '/images/avatar/'.$avatarname;
         }

        $users->save();
        activity()->log('memperbaharui profile');
        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changepassword()
    {
        $users = User::where('id', Auth::user()->id)->first();
        return view('profile.changepassword', compact('users'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatepassword(Request $request)
    {
        $request->validate([
            'oldpassword'       => 'required',
            'newpassword'       => 'required|min:8|max:100',
            'confirmpassword'   => 'required|same:newpassword'
        ]);

        $userpassword = auth()->user();
        if(Hash::check($request->oldpassword, $userpassword->password)){
                $userpassword->update([
                'password'      => bcrypt($request->newpassword)
            ]);

            return redirect()->back()->with('success', 'Password update');
        }else{
            return redirect()->back()->with('error', 'Old Password no match');
        }
    }
}
