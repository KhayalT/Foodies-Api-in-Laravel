<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfileResource;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::orderBy('created_at', 'desc')->get();
        return ProfileResource::collection($user);
    }

    public function show($id)
    {
        $user = User::find($id);
        return new ProfileResource($user);
    }

    public function update($id)
    {
    }
}
