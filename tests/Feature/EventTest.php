<?php

use App\Models\Event;
use Carbon\Carbon;

test('return_all_events', function () {
    $events = Event::factory()->count(3)->create();
    $response = $this->get('/events');

    expect($response)->assertStatus(200);
    expect(count($response->json()))->toBe(3);
});

test('create_new_event', function () {
    $response = $this->post('/events', [
        'name' => 'test',
        'date' => new Carbon('2024-04-29'),
        'address' => 'address',
        'city' => 'city',
    ]);
    $events = Event::all();

    expect($response)->assertStatus(200);
    expect(count($events))->toBe(1);
    expect($events[0]->name)->toBe('test');
});
