<?php

namespace PostApp\components;

use Illuminate\View\Component;

class CategoryButton extends Component
{
    private $category;

    public function __construct($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('PostApp::components/category-button', [
            'category' => $this->category
        ]);
    }
}
