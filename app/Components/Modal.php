<?php

namespace App\Components;

use Illuminate\Console\View\Components\Component;

class Modal extends Component
{
    public string $title;
    public string $content;
    public bool $show;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function render()
    {
        return view('components.modal');
    }
}
