<?php

use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('has course page', function () {
    $user = User::factory()->create();
    $response = $this->get(route('user.pelatihan'));

    $response->assertStatus(200);
});

it('can search course posts', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get(route('user.pelatihan', ['search' => 'example']));

    $response->assertStatus(200);
    $response->assertSee('example');
});

it('can sort course posts by newest', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get(route('user.pelatihan', ['sorted_by' => 'newest']));

    $response->assertStatus(200);
    $response->assertSee('newest');
});

it('can sort course posts by popularity', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get(route('user.pelatihan', ['sorted_by' => 'popularity']));

    $response->assertStatus(200);
    $response->assertSee('popularity');
});

it('can show a course posts', function () {
    $user = User::factory()->create();
    $checker = User::factory()->create();
    $course = Course::factory()->create([
        'created_by_id' => $user->id,
        'is_currently_checked_by' => $checker->id
    ]);
    $response = $this->actingAs($user)->get(route('user.pelatihan.show', ['id' => $course->id]));

    $response->assertStatus(200);
    $response->assertSee($course->name);
    $response->assertSee($course->description);
});