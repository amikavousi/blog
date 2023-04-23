<?php

namespace PostApp\Controller;

use App\Http\Controllers\Controller;
use CategoryApp\Model\Category;
use Illuminate\Database\Eloquent\Builder;
use PostApp\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->latest()->filter(request()->only(['search', 'category', 'author']))->paginate(6)->withQueryString();
        return view('PostApp::posts', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post)
    {
        return view('PostApp::post', [
            'post' => $post,
        ]);
    }
}
