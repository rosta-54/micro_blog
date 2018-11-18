<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
class CommentController extends Controller
{
    public function index(Comment $comment){
        return response()->json(['success' => $comment::all()]);
    }

    public function show(Comment $comment){
        return response()->json(['success' => $comment]);
    }

    public function store(CommentRequest $request){
        $comment = new Comment($request->all());
        return response()->json(['success' => $comment->save(), 'message' => 'Comment has been created']);
    }


    public function update(Comment $comment,CommentRequest $request){
        return response()->json(['success' => $comment->update($request->all()) , 'message' => 'Data has been updated']);

    }

    public function destroy(Comment $comment){
        return response()->json(['success' => $comment->delete(), 'message' => 'Data has been deleted']);
    }


}
