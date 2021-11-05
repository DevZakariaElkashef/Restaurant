<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::with('category')->paginate(10, ['*'], 'dishes');
        return view('admin.dishes.view-dishes', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.dishes.add-dishes', compact( 'categories'));
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
            'category_id'   => 'required|exists:categories,id',
            'name'          => 'required|string|min:3|max:50',
            'price'         => 'required|integer',
            'quantity'      => 'required|integer',
            'content'       => 'required|min:10|max:1000',
            'image'         => 'required|mimes:jpg,png,jpeg|max:5048'

        ]);

        
        $img_name = time() . '-' . str_replace(' ', '', $request->name) . '.' .$request->image->extension();
        $request->image->move(public_path('img/dishes'), $img_name);
        
        $dish                 = new Dish();
        $dish->category_id    = $request->category_id;
        $dish->name           = $request->name;
        $dish->price          = $request->price;
        $dish->quantity       = $request->quantity;
        $dish->content        = $request->content;
        $dish->image          = $img_name;

        $dish->save();


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
        $row = Dish::findOrFail($id);
        $categories = Category::all();
        return view('admin.dishes.edit-dishes', compact('row', 'categories'));
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
            'category_id'   => 'required|exists:categories,id',
            'name'          => 'required|string|min:3|max:50',
            'price'         => 'required|integer',
            'quantity'      => 'required|integer',
            'content'       => 'required|min:10|max:1000',
            'image'         => 'nullable|mimes:jpg,png,jpeg|max:5048'

        ]);
        
        $dish = Dish::findOrFail($id);

        if($request->hasFile('image')){
            $img_name = time() . '-' . str_replace(' ', '', $request->name) . '.' .$request->image->extension();
            $request->image->move(public_path('img/dishes'), $img_name);
            $dish->image      = $img_name;
            
        }
        
        $dish->category_id    = $request->category_id;
        $dish->name           = $request->name;
        $dish->price          = $request->price;
        $dish->quantity       = $request->quantity;
        $dish->content        = $request->content;

        $dish->save();


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
        Dish::findOrFail($id)->delete();
        return response()->json(['id'=> $id, 'message'=>'Data Deleted Successfully']);
    }
}
