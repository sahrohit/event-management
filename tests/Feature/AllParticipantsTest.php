<?php

namespace Tests\Feature;

use App\Http\Livewire\AllParticipants;
use App\Http\Livewire\Navbar;
use App\Http\Livewire\Footer;
use App\Models\Event;
use App\Models\Participant;

use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

test(
    'It displays any All Participants Page',
    fn () => get('/participants')
        ->assertOk()
);

test(
    'It displays participants page with participant list, navbar and footer livewire components',
    fn () => get('/participants')
        ->assertSeeLivewire(Navbar::class)->assertSeeLivewire(AllParticipants::class)->assertSeeLivewire(Footer::class)
);

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
        Participant::factory()->create(['event_id' => Event::latest()->first()->id, 'email' => 'deleteall@test.com']);

        livewire(AllParticipants::class, ['event' => Participant::latest()->first()->event])->call('delete', Participant::latest()->first()->id);

        $this->assertFalse(Participant::whereEmail('deleteall@test.com')->exists());

        Participant::whereEmail('deleteall@test.com')->delete();
    }
);
