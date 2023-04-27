<?php

namespace CommentApp\DB;

use CommentApp\Model\Comment;
use Illuminate\Http\Request;

class StoreComment
{
    public static function store(Request $request)
    {
        try {
            return Comment::query()->create([
                'user_id' => auth()->id(),
                'post_id' => $request->post_id,
                'body' => $request->body
            ]);
        } catch (\Exception $exception) {
            report($exception);
            return redirect()->back();
        }
    }
}
