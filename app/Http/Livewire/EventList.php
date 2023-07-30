<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventList extends Component
{
    public function render()
    {
        return view('livewire.event-list', [
            'events' => Event::orderBy('time_begin', 'asc')->get(),
        ]);
    }
}