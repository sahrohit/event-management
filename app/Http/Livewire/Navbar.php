<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{

    public bool $is_options_open = false;
    public function render()
    {
        return view('livewire.navbar');
    }
}