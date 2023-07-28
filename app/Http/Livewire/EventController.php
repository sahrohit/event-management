<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventController extends Component
{
    public function render(int $id)
    {
        return view('livewire.event-controller', [
            'event' => Event::find($id)
        ]);
    }
}