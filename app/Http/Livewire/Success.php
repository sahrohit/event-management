<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Participant;
use Livewire\Component;

class Success extends Component
{
    public $event;
    public $participant;
    public function render()
    {
        $queryParams = (object) request()->query();

        $this->event = Event::where('id', $queryParams->id)->first();

        $this->participant = Participant::where('id', $queryParams->participant_id)->first();

        return view('livewire.success', [
            'queryParams' => $queryParams,
            'event' => $this->event,
            'participant' => $this->participant,
        ]);
    }
}