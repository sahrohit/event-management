<?php

namespace Tests\Feature;

use App\Http\Livewire\AddParticipant;
use App\Models\Participant;
use function Pest\Laravel\get;

test(
    'It displays the Edit page',
    fn() => get('/edit?participant_id=' . Participant::inRandomOrder()->first()->id)
        ->assertOk()
);

test(
    'Edit Participant Page contains livewire component',
    fn() => get('/edit?participant_id=' . Participant::inRandomOrder()->first()->id)
        ->assertSeeLivewire(AddParticipant::class)
);

test('Events from the database are visible in the Event list', function () {
    $participant = Participant::inRandomOrder()->first();

    get('/edit?participant_id=' . $participant->id)->assertSee([$participant->first_name, $participant->last_name, $participant->phone_number, $participant->email, $participant->emergency_contact, $participant->country, $participant->id_type, $participant->id_number, $participant->food_preference, $participant->room_preference, $participant->require_parking]);
});

// test('Events are displayed in the order of beginning time', function () {
//     $events = Event::orderBy('time_begin', 'asc')->get();
//     get('/')->assertSeeInOrder([$events[0]->title, $events[1]->title, $events[2]->title]);
// });