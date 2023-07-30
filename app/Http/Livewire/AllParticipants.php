<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use Livewire\Component;
use Livewire\WithPagination;

class AllParticipants extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.participant-list', [
            'participants' => Participant::latest()->paginate(10)
        ]);
    }
}