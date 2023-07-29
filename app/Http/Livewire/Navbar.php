<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Navbar extends Component
{

    // Get the current route information from the router

    public $routeName;
    public $routeAction;

    public function mount()
    {
        $this->routeName = Route::currentRouteName();
        $this->routeAction = Route::currentRouteAction();
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}