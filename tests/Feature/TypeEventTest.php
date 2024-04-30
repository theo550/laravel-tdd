<?php

use App\Models\Type;

test('return_all_events_type', function () {
    $types = Type::factory()->count(3)->create();
    $response = $this->get('/types');

    expect($response)->assertStatus(200);
    expect($response->json())->toHaveCount(3);
    expect($response->json())->toEqual($types->toArray());
});

test('create_new_type', function () {
    $response = $this->post('/types', [
        'name' => 'test'
    ]);

    expect($response)->assertStatus(200);
    expect($response->json()[0]['name'])->toBe('test');
    expect(Type::all()->toArray())->toHaveCount(1);
});
