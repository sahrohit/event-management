<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Livewire\AddParticipant;
use App\Models\Event;
use App\Models\Participant;
use Livewire\Livewire;
use Tests\TestCase;

class ParticipantsTest extends TestCase
{

    /** @test */
    function can_create_participant()
    {
        Livewire::test(AddParticipant::class)
            ->set('event', Event::latest()->first())
            ->set('first_name', 'foo')
            ->set('last_name', 'bar')
            ->set('email', 'test@test.com')
            ->set('phone_number', '1234567890')
            ->set('country', 'Nepal')
            ->set('emergency_contact', '0987654321')
            ->set('require_parking', '1')
            ->set('room_preference', 'single')
            ->set('food_preference', 'vegetarian')
            ->set('id_type', 'citizenship')
            ->set('id_number', '1234567890')
            ->call('submit');

        $this->assertTrue(Participant::whereEmail('test@test.com')->exists());

        Participant::whereEmail('test@test.com')->delete();
    }

    /** @test */
    // function can_set_initial_title()
    // {
    //     $this->actingAs(User::factory()->create());

    //     Livewire::test(CreatePost::class, ['initialTitle' => 'foo'])
    //         ->assertSet('title', 'foo');
    // }

    /** @test */
    function email_is_required()
    {
        Livewire::test(AddParticipant::class)
            ->set('email', '')
            ->call('submit')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test */
    function is_redirected_to_result_page_after_participant_creation()
    {
        Livewire::test(AddParticipant::class)
            ->set('event', Event::latest()->first())
            ->set('first_name', 'foo')
            ->set('last_name', 'bar')
            ->set('email', 'test@test.com')
            ->set('phone_number', '1234567890')
            ->set('country', 'India')
            ->set('emergency_contact', '0987654321')
            ->set('require_parking', '1')
            ->set('room_preference', 'single')
            ->set('food_preference', 'vegetarian')
            ->set('id_type', 'citizenship')
            ->set('id_number', '1234567890')
            ->call('submit')
            ->assertRedirect('/result?id=' . Event::latest()->first()->id . '&participant_id=' . Participant::latest()->first()->id . '&pnr=' . Participant::latest()->first()->pnr);

        Participant::whereEmail('test@test.com')->delete();
    }
}