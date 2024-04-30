<?php

use App\Models\Type;

test('return_all_events_type', function () {
    $types = Type::factory()->count(3)->create();
    $response = $this->get('/types');

    expect($response)->assertStatus(200);
    expect(Type::all())->toBe(3);
});
