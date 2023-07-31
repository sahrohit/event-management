<?php

namespace Tests\Feature;

use App\Http\Livewire\AddParticipant;
use App\Http\Livewire\ParticipantList;
use App\Models\Event;
use App\Models\Participant;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

test(
    'It displays any Events Page',
    fn() => get('/' . Event::inRandomOrder()->first()->id)
        ->assertOk()
);

test(
    'Event Page should contain add participant and participant list livewire components',
    fn() => get('/' . Event::inRandomOrder()->first()->id)
        ->assertSeeLivewire(AddParticipant::class)->assertSeeLivewire(ParticipantList::class)
);

test("Correct event is displayed", fn() => get('/' . Event::latest()->first()->id)
    ->assertSee(Event::latest()->first()->title)->assertSee(Event::latest()->first()->description));


test('Submitting the form, inserts into the database', function () {

    livewire(AddParticipant::class)
        ->set('event', Event::latest()->first())
        ->set('first_name', 'Test')
        ->set('last_name', 'Test')
        ->set('phone_number', '1234567890')
        ->set('email', 'test@test.com')
        ->set('emergency_contact', '1234567890')
        ->set('country', 'nepal')
        ->set('id_type', 'passport')
        ->set('id_number', '1234567890')
        ->set('food_preference', 'vegetarian')
        ->set('room_preference', 'single')
        ->set('require_parking', 'yes')
        ->call('submit');

    $this->assertTrue(Participant::whereEmail('test@test.com')->exists());
    Participant::whereEmail('test@test.com')->delete();
});

test('Email is required', function () {
    livewire(AddParticipant::class)
        ->set('email', '')
        ->call('submit')
        ->assertHasErrors(['email' => 'required']);
});

test('Should be a valid email', function () {
    livewire(AddParticipant::class)
        ->set('email', 'abcdefghijklmnop')
        ->call('submit')
        ->assertHasErrors(['email' => 'email']);
});

test('Email must be unique', function () {
    Participant::factory()->create(['email' => 'already@present.com']);
    livewire(AddParticipant::class)
        ->set('email', 'already@present.com')
        ->call('submit')
        ->assertHasErrors(['email' => 'unique']);
    Participant::whereEmail('already@present.com')->delete();
});

test(
    'It displays the result page',
    function () {
        Participant::factory()->create(['event_id' => Event::latest()->first()->id]);
        get('/result?id=' . Participant::latest()->first()->event->id . '&participant_id=' . Participant::latest()->first()->id . '&pnr=' . Participant::latest()->first()->pnr)
            ->assertOk();
        Participant::find(Participant::latest()->first()->id)->delete();
    }
);