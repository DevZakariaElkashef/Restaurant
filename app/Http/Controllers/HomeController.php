<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        $res         = Restaurant::findOrFail(1);
        $categories  = Category::limit(4)->get();
        $dishes      = Dish::limit(8)->get();
        $chefs       = User::where('role', '=', 'chef')->limit(3)->get();
        
        return view('index', compact('res', 'categories', 'dishes', 'chefs'));
    }

    public function menu () {
        $res         = Restaurant::findOrFail(1);
        $categories  = Category::all();
        $dishes      = Dish::all();
        return view('menu', compact('res', 'categories', 'dishes'));
    }

    public function gallery () {
        $res         = Restaurant::findOrFail(1);
        $categories  = Category::all();
        $dishes      = Dish::all();
        return view('gallery', compact('res', 'categories', 'dishes'));
    }

    public function chefs () {
        $res         = Restaurant::findOrFail(1);
        $chefs       = User::where('role', '=', 'chef')->get();
        return view('chefs', compact('res', 'chefs'));
    }
    
    public function cart () {
        $res         = Restaurant::findOrFail(1);
        return view('cart', compact('res'));
    }
    
    public function contact () {
        $res         = Restaurant::findOrFail(1);
        return view('contact', compact('res'));
    }
}
