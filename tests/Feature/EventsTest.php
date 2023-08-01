<?php

namespace Tests\Feature;

use App\Http\Livewire\EventList;
use App\Http\Livewire\Navbar;
use App\Http\Livewire\Footer;
use App\Models\Event;
use function Pest\Laravel\get;

test(
    'It displays Home Page',
    fn () => get('/')
        ->assertOk()
);

test(
    'It display EventList livewire component, with Navbar and Footer',
    fn () => get('/')
        ->assertSeeLivewire(EventList::class)->assertSeeLivewire(Navbar::class)->assertSeeLivewire(Footer::class)
);

test(
    'It displays Event Page',
    fn () => get('/' . Event::latest()->first()->id)
        ->assertOk()
);

test('It display the events from the database', function () {
    $event = Event::inRandomOrder()->first();
    get('/')->assertSee([$event->title, $event->description, $event->location, $event->time_begin, $event->time_end, $event->participants->count()]);
});

test('It display the events in the order of beginning time', function () {
    $events = Event::orderBy('time_begin', 'asc')->get();
    get('/')->assertSeeInOrder([$events[0]->title, $events[1]->title, $events[2]->title]);
});
