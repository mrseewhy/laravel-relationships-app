<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profiles = Profile::all();
        return view('profile_index', ['profiles' => $profiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('profile_create');

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

     
       $request->validate([
            'nickname' => 'required|unique:profiles|max:255',
            'gender' => 'required',
            'cartype' => 'required',
            'bio' => 'required|min:20',
        ]);

        $profile = new Profile();

        $profile->nickname = $request->nickname;
        $profile->gender = $request->gender;
        $profile->cartype = $request->cartype;
        $profile->bio = $request->bio;
        $profile->save();

        $request->session()->flash('message', "You have created a new profile");
        return redirect(route('profile.show', ['profile' => $profile->id]));

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
        $profile = Profile::findorFail($id);
        return view('profile_show', ['profile' => $profile]);
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
        $profile = Profile::findorFail($id);
        return view('profile_edit', ['profile' => $profile]);
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
        //
        $profile = Profile::findorFail($id);
        $request->validate([
            'nickname' => 'required|max:255',
            'gender' => 'required',
            'cartype' => 'required',
            'bio' => 'required|min:20',
        ]);

        $profile->nickname = $request->nickname;
        $profile->gender = $request->gender;
        $profile->cartype = $request->cartype;
        $profile->bio = $request->bio;
        $profile->save();

        $request->session()->flash('message', "You have updated this profile");
        return redirect(route('profile.show',['profile' => $profile]));

        
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
        $profile = Profile::findorFail($id);
        $profile->delete();
        session()->flash('message', "Post Deleted");
        return redirect(route('profile.index'));
    }
}
