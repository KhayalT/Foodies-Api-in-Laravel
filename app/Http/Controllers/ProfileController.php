<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfileResource;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __invoke()
    {
    }

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

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::find($id);
        $user->update($request->all());
        return ProfileResource::collection($user);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(null, 204);
    }
}
