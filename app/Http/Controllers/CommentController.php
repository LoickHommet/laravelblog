<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentStoreResquest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store($id ,CommentStoreResquest $request)
    {
        $paramas = $request->validated();
        $paramas['post']= $id;
        Comment::create($paramas);
        return back();
    }

    public function delete($id){
        $comment = Comment::find($id);
        $comment->delete();
        return back();
    }
}
