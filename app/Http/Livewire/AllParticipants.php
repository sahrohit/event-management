<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use Livewire\Component;

class AllParticipants extends Component
{
    public function render()
    {
        return view('livewire.all-participants', [
            'participants' => Participant::all(),
        ]);
    }
}