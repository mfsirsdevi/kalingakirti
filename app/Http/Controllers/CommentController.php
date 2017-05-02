<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $this->validate($request, [
            'author' => 'required',
            'email' => 'required | email',
            'body' => 'required',
        ]);

        $comment = new Comment;
        $comment->author = $request->author;
        $comment->email = $request->email;
        $comment->body = $request->body;
        $article->comments()->save($comment);
        return back();
    }
}
