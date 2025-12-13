<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        Comment::create([
            'post_id' => $request->post_id,
            'body'    => $request->body,
        ]);

        return redirect()->route('posts.show', $request->post_id);
    }

    public function edit(Comment $comment)
    {
        $post = $comment->post;

        return view('comments.edit', compact('comment', 'post'));
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update([
            'body' => $request->body,
        ]);

        return redirect()->route('posts.show', $comment->post_id);
    }

    public function destroy(Comment $comment)
    {
        $postId = $comment->post_id;

        $comment->delete();

        return redirect()->route('posts.show', $postId);
    }
}
