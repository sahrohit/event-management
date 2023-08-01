<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Participant;
use Livewire\Component;
use Livewire\WithPagination;

class ParticipantList extends Component
{
    use WithPagination;
    public Event $event;
    public function delete($id)
    {
        Participant::destroy($id);
    }

    public function render()
    {
        if (!Participant::where("event_id", "=", $this->event->id)) {
            return view('livewire.participant-list', [
                'participants' => [],
            ]);
        }

        return view('livewire.participant-list', [
            'participants' => Participant::where("event_id", "=", $this->event->id)->paginate(10),
        ]);
    }
}
