<?php

namespace CommentApp\components;

use Illuminate\View\Component;

class Comment extends Component
{
    private $post;

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('CommentApp::components.comment', [
            'comments' => $this->post->comments->reverse()
        ]);
    }
}
