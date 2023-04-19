<?php

namespace PostApp\components;

use Illuminate\View\Component;

class CategoryFilter extends Component
{
    private $categories;
    private $currentCategory;

    public function __construct($categories, $currentCategory = null)
    {
        $this->categories = $categories;
        $this->currentCategory = $currentCategory;
    }

    public function render()
    {
        return view('PostApp::components/category-filter', [
            'categories' => $this->categories,
            'currentCategory' => $this->currentCategory
        ]);
    }
}
