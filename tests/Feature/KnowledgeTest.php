<?php

use App\Models\User;
use App\Models\Knowledge;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('has knowledge page', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get(route('user.knowledge'));

    $response->assertStatus(200);
});

it('can search knowledge articles', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get(route('user.knowledge', ['search' => 'example']));

    $response->assertStatus(200);
    $response->assertSee('example');
});

it('can sort knowledge articles by newest', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get(route('user.knowledge', ['sorted_by' => 'newest']));

    $response->assertStatus(200);
    $response->assertSee('Newest');
});

it('can sort knowledge articles by popularity', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get(route('user.knowledge', ['sorted_by' => 'popularity']));

    $response->assertStatus(200);
    $response->assertSee('Popularity');
});

it('can show a knowledge article', function () {
    $user = User::factory()->create();
    $checker = User::factory()->create(); // Create an additional user for `is_currently_checked_by`
    $knowledge = Knowledge::factory()->create([
        'user_id' => $user->id,
        'is_currently_checked_by' => $checker->id // Set a valid user ID for `is_currently_checked_by`
    ]);

    $response = $this->actingAs($user)->get(route('user.knowledge.show', ['id' => $knowledge->id]));

    $response->assertStatus(200);
    $response->assertSee($knowledge->name);
    $response->assertSee($knowledge->description);
});


