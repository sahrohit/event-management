<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Participant;
use Livewire\Component;
use Redirect;

class AddParticipant extends Component
{
    public Event $event;
    public Participant|null $participant;
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


    public function generatePNR()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 8; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'phone_number' => 'required|min:10',
        'email' => ['required', 'email', 'unique:participants,email'],
        'emergency_contact' => 'required|min:10',
        'country' => 'required|min:3',
        'id_type' => 'required',
        'id_number' => 'required|min:3',
        'food_preference' => 'required',
        'room_preference' => 'required',
        'require_parking' => 'required',
    ];

    public function mount()
    {
        if (!!optional($this)->participant) {
            $this->first_name = $this->participant->first_name;
            $this->last_name = $this->participant->last_name;
            $this->phone_number = $this->participant->phone_number;
            $this->email = $this->participant->email;
            $this->emergency_contact = $this->participant->emergency_contact;
            $this->country = $this->participant->country;
            $this->id_type = $this->participant->id_type;
            $this->id_number = $this->participant->id_number;
            $this->food_preference = $this->participant->food_preference;
            $this->room_preference = $this->participant->room_preference;
            $this->require_parking = $this->participant->require_parking;
        }
    }

    public function submit()
    {

        if (!!optional($this)->participant) {
            $this->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required|min:10',
                'email' => ['required', 'email', 'unique:participants,email,' . $this->participant->id],
                'emergency_contact' => 'required|min:10',
                'country' => 'required|min:3',
                'id_type' => 'required',
                'id_number' => 'required|min:3',
                'food_preference' => 'required',
                'room_preference' => 'required',
                'require_parking' => 'required',
            ]);

            Participant::where('id', $this->participant->id)->update([
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
                'event_id' => $this->event->id,
                'pnr' => $this->generatePNR(),
            ]);
            $this->reset(['first_name', 'last_name', 'phone_number', 'email', 'emergency_contact', 'country', 'id_type', 'id_number', 'food_preference', 'room_preference', 'require_parking']);

            return Redirect::to('/result?id=' . $this->event->id . '&participant_id=' . $this->participant->id . '&pnr=' . $this->participant->pnr);

        }
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
            'event_id' => $this->event->id,
            'pnr' => $this->generatePNR(),
        ]);

        $this->reset(['first_name', 'last_name', 'phone_number', 'email', 'emergency_contact', 'country', 'id_type', 'id_number', 'food_preference', 'room_preference', 'require_parking']);

        return Redirect::to('/result?id=' . $this->event->id . '&participant_id=' . Participant::latest()->first()->id . '&pnr=' . Participant::latest()->first()->pnr);
    }

    public function render()
    {


        return view('livewire.add-participant');
    }
}