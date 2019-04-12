<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile')->with('user', Auth::user());
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function update(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'facebook' => 'required|url',
        'youtube' => 'required|url'
    ]);

    $user =  Auth::user()->first();

    if($user) {
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);
        }
    }

    if( $user->save() ) {

        $profile = Profile::first();

        $profile->facebook = $request->facebook;
        $profile->youtube = $request->youtube;
        $profile->about = $request->about;

        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;
            $avatar_new_name = time() . $avatar->getClientOriginalName();
            $avatar->move('uploads/avatars', $avatar_new_name);
            $profile->avatar = 'uploads/avatars/' . $avatar_new_name ;
        }
    }

    if($profile->save()) {
        Session::flash('success', 'Account profile updated.');
    } else {
        Session::flash('error', 'Failed to update.');
    }
    return back();
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
}
