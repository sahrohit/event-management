<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Participant;
use Livewire\Component;

class ParticipantList extends Component
{
    public Event $event;

    public function render()
    {
        if (!Participant::where("event_id", "=", $this->event->id)) {
            return view('livewire.participant-list', [
                'participants' => [],
            ]);
        }

        return view('livewire.participant-list', [
            'participants' => Participant::where("event_id", "=", $this->event->id)->get(),
        ]);
    }
}