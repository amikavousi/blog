<?php

namespace PostApp\components;

use Carbon\Carbon;
use Illuminate\View\Component;

class PostCard extends Component
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
        return view('PostApp::components.post-card', [
            'post' => $this->post,
            ]);
    }
}
