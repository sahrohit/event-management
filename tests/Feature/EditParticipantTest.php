<?php

namespace Tests\Feature;

use App\Http\Livewire\AddParticipant;
use App\Http\Livewire\Navbar;
use App\Http\Livewire\Footer;
use App\Models\Participant;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

test(
    'It displays the Edit page',
    fn () => get('/edit?participant_id=' . Participant::inRandomOrder()->first()->id)
        ->assertOk()
);

test(
    'It display the Edit Participant, Navbar and Footer livewire component',
    fn () => get('/edit?participant_id=' . Participant::inRandomOrder()->first()->id)
        ->assertSeeLivewire(AddParticipant::class)->assertSeeLivewire(Navbar::class)->assertSeeLivewire(Footer::class)
);

test('It display the participant details from the database for editing', function () {
    $participant = Participant::inRandomOrder()->first();

    livewire(AddParticipant::class, ['participant' => $participant, 'event' => $participant->event])->assertSet('first_name', $participant->first_name)
        ->assertSet('last_name', $participant->last_name)
        ->assertSet('phone_number', $participant->phone_number)
        ->assertSet('email', $participant->email)
        ->assertSet('emergency_contact', $participant->emergency_contact)
        ->assertSet('country', $participant->country)
        ->assertSet('id_type', $participant->id_type)
        ->assertSet('id_number', $participant->id_number)
        ->assertSet('food_preference', $participant->food_preference)
        ->assertSet('room_preference', $participant->room_preference)
        ->assertSet('require_parking', $participant->require_parking);
});

// test('It display the participant details from the database for editing', function () {
//     $participant = Participant::inRandomOrder()->first();

//     livewire(AddParticipant::class, ['participant' => $participant, 'event' => $participant->event])->assertSet('first_name', $participant->first_name)
//         ->assertSet('last_name', $participant->last_name)
//         ->assertSet('phone_number', $participant->phone_number)
//         ->assertSet('email', $participant->email)
//         ->assertSet('emergency_contact', $participant->emergency_contact)
//         ->assertSet('country', $participant->country)
//         ->assertSet('id_type', $participant->id_type)
//         ->assertSet('id_number', $participant->id_number)
//         ->assertSet('food_preference', $participant->food_preference)
//         ->assertSet('room_preference', $participant->room_preference)
//         ->assertSet('require_parking', $participant->require_parking);
// });
