<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use Livewire\Component;

class ParticipantList extends Component
{
    public function render()
    {
        return view('livewire.participant-list', [
            'participants' => Participant::orderBy('created_at', 'desc')->get(),
        ]);
    }
}