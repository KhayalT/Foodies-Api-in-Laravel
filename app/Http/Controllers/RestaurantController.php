<?php

namespace App\Http\Controllers;

use App\Http\Resources\RestaurantCollection;
use App\Models\Restaurant;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::orderBy('created_at', 'desc')->get();
        return RestaurantCollection::collection($restaurant);
    }

    public function store(Request $request)
    {
        $request->validate([
            'restaurant_name' => 'required|min:5|max:200|unique:restaurants',
            'image' => 'required',
            'price' => 'required|numeric',
            'delivery_time' => 'required|numeric',
        ]);

        $restaurant = new Restaurant;
        $restaurant->category_id = $request->category_id;
        $restaurant->restaurant_name = $request->restaurant_name;
        $restaurant->image = $request->image;
        $restaurant->price = $request->price;
        $restaurant->delivery_time = $request->delivery_time;
        $restaurant->created_at = now();

        $restaurant->save();
        return response()->json(['data' => new RestaurantCollection($restaurant)], 201);
    }
}
