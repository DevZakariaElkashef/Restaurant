<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::findOrFail(1);
        return view('admin.settings', compact('restaurant'));
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
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'another_address' => 'nullable',
            'phone' => 'required',
            'phone_address' => 'nullable',
            'logo' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);
        $img_name = time() . '-' . str_replace(' ', '', $request->name) . '.' .$request->logo->getExtension();
        $request->logo->move(public_path('img'), $img_name);
        
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->logo = $request->logo;
        $restaurant->name = $request->name;
        $restaurant->email = $request->email;
        $restaurant->address = $request->address;
        $restaurant->another_address = $request->another_address;
        $restaurant->phone = $request->phone;
        $restaurant->another_phone = $request->another_phone;

        $restaurant->save();

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
