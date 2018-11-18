<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
class PostController extends Controller
{

    public function index(Post $post){

        return response()->json(['success' => $post::all()]);
    }
    public function show(Post $post){

        return response()->json(['success' => $post]);
    }
    public function store(PostRequest $request)
    {
        $post = new Post($request->all());
        return response()->json(['success' => $post->save(), 'message' => 'Post has been created']);
    }


    public function update(Post $post,PostRequest $request){
        return response()->json(['success' => $post->update($request->all()), 'message' => 'Data has been updated']);

    }

    public function destroy(Post $post){
       return response()->json(['success' => $post->delete(), 'message' => 'Data has been deleted']);

    }


}
