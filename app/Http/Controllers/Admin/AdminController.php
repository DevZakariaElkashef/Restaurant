<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('role', '=', 'admin')
                        ->orWhere('role', '=', 'owner')
                        ->paginate(8);
        return view('admin.admins.view-admins', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = ['admin', 'owner'];
        return view('admin.admins.add-admins', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|min:3',
            'email'            => 'required|email|unique:users',
            'password'         => 'required|min:8',
            'phone'            => 'required|min:11',
            'address'          => 'required|',
            'role'             => 'required',
            'salary'           => 'required|integer',
            'image'            => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $img_name = time() . '-' . str_replace(' ', '', $request->name) . '.' .$request->image->extension();
        $request->image->move(public_path('img/users'), $img_name);

        $user = new User();
        $user->name             = $request->name;
        $user->email            = $request->email;
        $user->password         = Hash::make($request->password);
        $user->role             = $request->role;
        $user->phone            = $request->phone;
        $user->address          = $request->address;
        $user->role             = $request->role;
        $user->salary           = $request->salary;
        $user->image            = $img_name;
        $user->save();

        return response()->json(['message'=>'Data added Successfully']);
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
        $row = User::findOrFail($id);
        $roles = ['admin', 'owner'];
        return view('admin.admins.edit-admins', compact('row', 'roles'));
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
            'name'             => 'required|min:3',
            'email'            => 'required|email',
            'password'         => 'nullable|min:8',
            'phone'            => 'required|min:11',
            'address'          => 'required|',
            'role'             => 'required',
            'salary'           => 'required|integer',
            'image'            => 'nullable|mimes:jpg,png,jpeg|max:5048'
        ]);

        $user = User::findOrFail($id);

        if($request->hasFile('image') || !empty($request->password)){

            $img_name = time() . '-' . str_replace(' ', '', $request->name) . '.' .$request->image->extension();
            $request->image->move(public_path('img/users'), $img_name);
            $user->password         = Hash::make($request->password);
            $user->image            = $img_name;
            
        }
        $user->name             = $request->name;
        $user->email            = $request->email;
        $user->role             = $request->role;
        $user->phone            = $request->phone;
        $user->address          = $request->address;
        $user->role             = $request->role;
        $user->salary           = $request->salary;
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
        User::findOrFail($id)->delete();
        return response()->json(['id'=> $id, 'message'=>'Data Deleted Successfully']);
    }
}
