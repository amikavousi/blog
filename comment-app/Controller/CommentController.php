<?php

namespace CommentApp\Controller;

use App\Http\Controllers\Controller;
use CommentApp\DB\StoreComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
       StoreComment::store($request);
       return redirect()->back()->with('success', 'your comment posted');
    }
}
