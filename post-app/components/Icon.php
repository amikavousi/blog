<?php

namespace PostApp\components;

use Illuminate\View\Component;

class Icon extends Component
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function render()
    {
        return view('PostApp::components/icon', [
            'name' => $this->name
        ]);
    }
}
