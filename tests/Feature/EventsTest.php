<?php

namespace Tests\Feature;

use App\Http\Livewire\EventList;
use App\Models\Event;
use function Pest\Laravel\get;

test(
    'It displays Home Page',
    fn() => get('/')
        ->assertOk()
);

test(
    'Home Page contains livewire component',
    fn() => get('/')
        ->assertSeeLivewire(EventList::class)
);

test(
    'It displays Event Page',
    fn() => get('/' . Event::latest()->first()->id)
        ->assertOk()
);

test('Events from the database are visible in the Event list', function () {
    $event = Event::inRandomOrder()->first();
    get('/')->assertSee([$event->title, $event->description, $event->location, $event->time_begin, $event->time_end, $event->participants->count()]);
});

test('Events are displayed in the order of beginning time', function () {
    $events = Event::orderBy('time_begin', 'asc')->get();
    get('/')->assertSeeInOrder([$events[0]->title, $events[1]->title, $events[2]->title]);
});