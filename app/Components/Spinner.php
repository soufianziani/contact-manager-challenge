<?php

namespace App\Components;

use Illuminate\Console\View\Components\Component;

class Spinner extends Component
{
    public function render()
    {
        return view('components.spinner');
    }
}
