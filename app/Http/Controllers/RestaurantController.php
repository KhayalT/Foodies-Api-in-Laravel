<?php

namespace App\Http\Controllers;

use App\Http\Resources\RestaurantCollection;
use App\Models\Restaurant;
use App\Models\Restaurant_Tag;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::orderBy('created_at', 'desc')->paginate(12);
        return RestaurantCollection::collection($restaurant);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
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

    public function storeTag(Request $request, $id)
    {
        $request->validate([
            'tag_id' => 'required'
        ]);

        $restaurant_tag = new Restaurant_Tag;
        $restaurant_tag->restaurant_id = $id;
        $restaurant_tag->tag_id = $request->tag_id;

        $restaurant_tag->save();
        return response()->json(['data' => new RestaurantCollection($restaurant_tag)], 201);
    }
}
