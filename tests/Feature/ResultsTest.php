<?php

namespace Tests\Feature;

use App\Http\Livewire\Success;
use App\Http\Livewire\Navbar;
use App\Http\Livewire\Footer;
use App\Models\Event;
use App\Models\Participant;

use function Pest\Laravel\get;

test(
    'It displays Result Page',
    function () {

        $participant = Participant::factory()->create(['event_id' => Event::latest()->first()->id])->latest()->first();
        get('/result?id=' . $participant->event->id . '&participant_id=' . $participant->id . '&pnr=' . $participant->pnr)
            ->assertOk();
        echo $participant->id;
        Participant::latest()->first()->delete();
    }
);

test(
    'It display Result, Navbar and Footer livewire component',
    function () {

        $participant = Participant::factory()->create(['event_id' => Event::latest()->first()->id])->latest()->first();

        get('/result?id=' . $participant->event->id . '&participant_id=' . $participant->id . '&pnr=' . $participant->pnr)
            ->assertSeeLivewire(Success::class)->assertSeeLivewire(Navbar::class)->assertSeeLivewire(Footer::class);

        Participant::latest()->first()->delete();
    }
);

test(
    'It display the ticket information on the Result Page',
    function () {
        $participant = Participant::factory()->create(['event_id' => Event::latest()->first()->id])->latest()->first();
        get('/result?id=' . $participant->event->id . '&participant_id=' . $participant->id . '&pnr=' . $participant->pnr)
            ->assertSee([$participant->first_name, $participant->last_name, $participant->event->title, $participant->event->time_begin, $participant->event->time_end,  $participant->pnr, "Successfully Registered"]);
        Participant::latest()->first()->delete();
    }
);
