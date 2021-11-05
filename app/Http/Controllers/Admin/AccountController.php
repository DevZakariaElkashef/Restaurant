<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.account');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'image'            => 'nullable|mimes:jpg,png,jpeg|max:5048',
            'name'             => 'required|min:3',
            'password'         => 'nullable|min:8',
            
            'day'              => 'nullable|integer',
            'mounth'           => 'nullable|integer',
            'year'             => 'nullable|integer',
            'jop'              => 'nullable',
            
            'bio'              => 'nullable|min:10',
            
            'country'          => 'nullable',
            'address'          => 'required',
            'location'         => 'nullable',
            'phone'            => 'required|min:11',
            'email'            => 'required|email',
            'website'          => 'nullable',

            'facebook'         => 'nullable',
            'twitter'          => 'nullable',
            'instagram'        => 'nullable',
            'github'           => 'nullable',
        ]);

        $user = User::findOrFail($id);

        if($request->hasFile('image') or !empty($request->password))
        {

            $img_name = time() . '-' . str_replace(' ', '', $request->name) . '.' .$request->image->extension();
            $request->image->move(public_path('img/users'), $img_name);
            $user->image            = $img_name;
            
            $user->password     = $request->password;
        }

        $user->day          = $request->day;
        $user->mounth       = $request->mounth;
        $user->year         = $request->year;

        $user->jop          = $request->jop;
        $user->bio          = $request->bio;

        $user->country      = $request->country;
        $user->location     = $request->location;
        $user->website      = $request->website;

        $user->facebook     = $request->facebook;
        $user->twitter      = $request->twitter;
        $user->instagram    = $request->instagram;
        $user->github       = $request->github;

        $user->name             = $request->name;
        $user->email            = $request->email;
        $user->phone            = $request->phone;
        $user->address          = $request->address;
        $user->save();


        return response()->json(['message'=>'Data Updated Successfully']);
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
