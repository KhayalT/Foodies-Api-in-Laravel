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
        $restaurant = Restaurant::all();
        return RestaurantCollection::collection($restaurant);
    }

    public function store(Request $request)
    {
    }
}
