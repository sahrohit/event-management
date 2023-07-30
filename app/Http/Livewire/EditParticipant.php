<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use App\Models\Event;
use Livewire\Component;

class EditParticipant extends Component
{

    public Event $event;
    public Participant $participant;

    public function render()
    {
        $queryParams = (object) request()->query();

        $this->participant = Participant::where('id', $queryParams->participant_id)->first();

        $this->event = Event::where('id', $this->participant->event()->get()->implode('id'))->first();

        return view('edit', [
            'event' => $this->event,
            'participant' => $this->participant,
        ]);
    }
}