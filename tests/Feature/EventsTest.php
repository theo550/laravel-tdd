<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventsTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_return_all_events(): void
    {
        $events = Event::factory()->count(3)->create();

        $response = $this->get('/events');

        $response
            ->assertStatus(200)
            ->assertJsonCount(3);
    }
}
