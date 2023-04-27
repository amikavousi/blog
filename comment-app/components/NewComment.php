<?php

namespace CommentApp\components;

use Illuminate\View\Component;

class NewComment extends Component
{
    private $postId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($postId)
    {
        $this->postId = $postId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('CommentApp::components.new-comment', [
            'postId' => $this->postId
        ]);
    }
}
