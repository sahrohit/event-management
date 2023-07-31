<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventList extends Component
{

    public $events;

    public function mount()
    {
        $this->events = Event::orderBy('time_begin', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.event-list');
    }
}