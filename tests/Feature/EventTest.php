<?php

use App\Models\City;
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
    }

    expect($response->json()[0])
        ->id->toBeInt()
        ->name->toBeString()
        ->date->toBeString()
        ->address->toBeString();
});

test('create_new_event', function () {
    $city = City::factory()->create();
    $types = Type::factory()->create();

    $response = $this->post('/events', [
        'name' => 'test',
        'date' => new Carbon('2024-04-29'),
        'address' => 'address',
        'types_id' => $types->id
    ]);
    $events = Event::all();

    expect($response)->assertStatus(200);
    expect(count($events))->toBe(1);
    expect($events[0])
        ->name->toBe('test')
        ->date->toBe('2024-04-29 00:00:00')
        ->address->toBe('address')
        ->types_id->toBe($types->id);
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

test('return all event by city', function () {
    $events = Event::factory()->count(10)->create();

    $response = $this->get('/event/city/1');

    // dd($response->json());
    expect($response)->assertStatus(200);
});
