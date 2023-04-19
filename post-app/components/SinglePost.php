<?php

namespace PostApp\components;

use Carbon\Carbon;
use Illuminate\View\Component;

class SinglePost extends Component
{
    private $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('PostApp::components.single-post', [
            'post' => $this->post,
        ]);
    }
}
