<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use Livewire\Component;

class AddParticipant extends Component
{
    public $first_name;
    public $last_name;
    public $phone_number;
    public $email;
    public $emergency_contact;
    public $country = "nepal";
    public $id_type = "passport";
    public $id_number;
    public $food_preference;
    public $room_preference;
    public $require_parking;

    protected $rules = [
        'first_name' => 'required|min:3',
        'last_name' => 'required|min:3',
        'phone_number' => 'required|min:10',
        'email' => 'required|email',
        'emergency_contact' => 'required|min:10',
        'country' => 'required|min:3',
        'id_type' => 'required',
        'id_number' => 'required|min:3',
        'food_preference' => 'required',
        'room_preference' => 'required',
        'require_parking' => 'required',
    ];

    public function submit()
    {

        $this->validate();

        Participant::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'emergency_contact' => $this->emergency_contact,
            'country' => $this->country,
            'id_type' => $this->id_type,
            'id_number' => $this->id_number,
            'food_preference' => $this->food_preference,
            'room_preference' => $this->room_preference,
            'require_parking' => $this->require_parking,
            'event_id' => 1,
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.add-participant');
    }
}