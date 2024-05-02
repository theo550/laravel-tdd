<?php

use App\Models\Event;
use App\Models\Type;
use Carbon\Carbon;

test('return_all_events', function () {
    $events = Event::factory()->count(3)->create();
    $response = $this->get('/events');

    expect($response)->assertStatus(200);
    expect(count($response->json()))->toBe(3);

    expect(is_array($response->json()))->toBeTrue();

    foreach ($response->json() as $event) {
        expect(array_key_exists('id', $event))->toBeTrue();
        expect(array_key_exists('name', $event))->toBeTrue();
        expect(array_key_exists('date', $event))->toBeTrue();
        expect(array_key_exists('address', $event))->toBeTrue();
        expect(array_key_exists('city', $event))->toBeTrue();
    }
});

test('create_new_event', function () {
    $types = Type::factory()->create();

    $response = $this->post('/events', [
        'name' => 'test',
        'date' => new Carbon('2024-04-29'),
        'address' => 'address',
        'city' => 'city',
        'types_id' => $types->id
    ]);
    $events = Event::all();

    expect($response)->assertStatus(200);
    expect(count($events))->toBe(1);
    expect($events[0]->name)->toBe('test');
});

test('delete_event', function () {
    $event = Event::factory()->create();

    $response = $this->delete('/events', [
        'id' => $event->id
    ]);

    expect($response)->assertStatus(200);
    expect(count(Event::all()))->toBe(0);
});

test('update_event', function () {
    $event = Event::factory()->create();

    $response = $this->put('/events', [
        'id' => $event->id,
        'name' => 'test'
    ]);

    expect($response)->assertStatus(200);
    expect(Event::find($event->id)->name)->toBe('test');
});
