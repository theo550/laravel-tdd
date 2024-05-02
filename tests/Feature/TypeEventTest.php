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
    expect($response->json()['name'])->toBe('test');
    expect(Type::all()->toArray())->toHaveCount(1);
});

test('delete_type', function () {
    $type = Type::factory()->create();
    $response = $this->delete('/types', [
        'id' => $type->id
    ]);

    expect($response)->assertStatus(200);
    expect($response->json())->toHaveCount(0);
});

test('update_type', function () {
    $type = Type::factory()->create();
    $response = $this->put('/types', [
        'id' => $type->id,
        'name' => 'test'
    ]);

    expect($response)->assertStatus(200);
    expect($response->json()["name"])->toBe('test');
});
