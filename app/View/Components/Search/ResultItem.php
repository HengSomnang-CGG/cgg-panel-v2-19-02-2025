<?php

namespace App\View\Components\Search;

use Illuminate\View\Component;

class ResultItem extends Component
{
    public $title;
    public $website_name;
    public $description;
    public $domain;
    public $image_icon;

    public function __construct($title, $website_name, $description, $domain, $image_icon = null)
    {
        $this->title = $title;
        $this->website_name = $website_name;
        $this->description = $description;
        $this->domain = $domain;
        $this->image_icon = $image_icon;
    }

    public function render()
    {
        return view('homepage.components.search.result-item');
    }
}
