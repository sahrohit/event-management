<?php

namespace Tests\Feature;

use App\Http\Livewire\AddParticipant;
use App\Http\Livewire\ParticipantList;
use App\Http\Livewire\Navbar;
use App\Http\Livewire\Footer;
use App\Models\Event;
use App\Models\Participant;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

test(
    'It displays any Events Page',
    fn () => get('/' . Event::inRandomOrder()->first()->id)
        ->assertOk()
);

test(
    'It displays event page with add participant, participant list, navbar and footer livewire components',
    fn () => get('/' . Event::inRandomOrder()->first()->id)
        ->assertSeeLivewire(Navbar::class)->assertSeeLivewire(AddParticipant::class)->assertSeeLivewire(ParticipantList::class)->assertSeeLivewire(Footer::class)
);

test("It displays the Correct event information from the database", fn () => get('/' . Event::latest()->first()->id)
    ->assertSee(Event::latest()->first()->title)->assertSee(Event::latest()->first()->description));

test('It displays email is required error message', function () {
    livewire(AddParticipant::class)
        ->set('email', '')
        ->call('submit')
        ->assertHasErrors(['email' => 'required'])->assertSee('The email field is required.');
});

test('It displays valid email error message', function () {
    livewire(AddParticipant::class)
        ->set('email', 'abcdefghijklmnop')
        ->call('submit')
        ->assertHasErrors(['email' => 'email'])->assertSee('The email field must be a valid email address.');
});

test('It displays Email must be unique error message', function () {
    Participant::factory()->create(['email' => 'already@present.com']);
    livewire(AddParticipant::class)
        ->set('email', 'already@present.com')
        ->call('submit')
        ->assertHasErrors(['email' => 'unique'])->assertSee("The email has already been taken.");
    Participant::whereEmail('already@present.com')->delete();
});

test('It displays the data in the database after submitting of the form', function () {

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

test("It displays the table sorted by created at on descending order", function () {
    $participants = Participant::where(['event_id' => Event::latest()->first()->id])->orderBy('created_at', 'desc')->get();
    livewire(ParticipantList::class, ['event' => Event::latest()->first()])->assertSeeInOrder([$participants[0]->first_name, $participants[1]->first_name, $participants[2]->first_name]);
    get('/' . Event::latest()->first()->id)->assertSeeInOrder([$participants[0]->first_name, $participants[1]->first_name, $participants[2]->first_name]);
});

test(
    'It displays the result page with the correct data',
    function () {
        Participant::factory()->create(['event_id' => Event::latest()->first()->id]);
        get('/result?id=' . Participant::latest()->first()->event->id . '&participant_id=' . Participant::latest()->first()->id . '&pnr=' . Participant::latest()->first()->pnr)
            ->assertOk();
        Participant::find(Participant::latest()->first()->id)->delete();
    }
);

test(
    'It deletes the participant record from the database',
    function () {
        Participant::factory()->create(['event_id' => Event::latest()->first()->id, 'email' => 'delete@test.com']);

        livewire(ParticipantList::class, ['event' => Participant::latest()->first()->event])->call('delete', Participant::latest()->first()->id);

        $this->assertFalse(Participant::whereEmail('delete@test.com')->exists());
        Participant::whereEmail('delete@test.com')->delete();
    }
);
