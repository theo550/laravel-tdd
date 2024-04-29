<?php

use App\Models\Event;

test('return all events', function () {
    $events = Event::factory()->count(3)->create();
    $response = $this->get('/events');

    expect($response)->assertStatus(200);
    expect(count($response->json()))->toBe(3);
});
