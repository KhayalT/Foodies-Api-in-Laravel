<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tag = Tag::orderBy('created_at', 'desc')->get();
        return TagResource::collection($tag);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255'
        ]);

        $tag = new Tag;
        $tag->name = $request->get('name');
        $tag->created_at = now();
        $tag->save();

        return response()->json(['data' => new TagResource($tag)], 201);
    }

    public function destroy($id)
    {
        $tag = Tag::find('id');
        $tag->delete();
        return response()->json(null, 204);
    }
}
