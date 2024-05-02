<?php

use App\Models\City;

test('return all cities', function () {
    $cities = City::factory()->count(3)->create();
    $response = $this->get('/cities');

    expect($response)->assertStatus(200);
    expect($response->json())->toHaveCount(3);
});
