<?php

namespace PostApp\components;

use CategoryApp\Model\Category;
use Illuminate\View\Component;

class CategoryFilter extends Component
{
    private $categories;

    public function __construct()
    {
//        $this->categories = $categories;
    }

    public function render()
    {
        return view('PostApp::components/category-filter', [
            'categories' => Category::all(),
            'currentCategory' => request('category') ? Category::query()->firstWhere('slug', request('category')) : null
        ]);
    }
}
