<?php

use App\Enums\TalkType;
use App\Models\Talk;
use App\Models\User;

test('a user can update their a talk', function () {
    $talk = Talk::factory()->create();

    $response = $this
        ->actingAs($talk->author)
        ->get(route('talks.edit', $talk))
        ->assertOk();

    $response = $this
        ->actingAs($talk->author)
        ->patch(route('talks.update', $talk), [
            'title' => $title = fake()->sentence,
            'type' => TalkType::KEYNOTE->value,
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('talks.show', $talk));

    $this->assertDatabaseHas('talks', [
        'title' => $title,
    ]);
});

test('a user cannot update a talk of another user', function () {
    $user = User::factory()->create();
    $otherUser = User::factory()->create();

    $talk = $user->talks()->create([
        'title' => $title = fake()->sentence,
        'type' => TalkType::KEYNOTE,
    ]);

    $response = $this
        ->actingAs($otherUser)
        ->get(route('talks.edit', $talk))
        ->assertForbidden();

    $response = $this
        ->actingAs($otherUser)
        ->get(route('talks.update', $talk))
        ->assertForbidden();

    $response = $this
        ->actingAs($otherUser)
        ->patch(route('talks.update', $talk), [
            'title' => 'My Updated Talk',
            'type' => TalkType::STANDARD->value,
        ])
        ->assertForbidden();
    $this->assertEquals($title, $talk->refresh()->title);
    $response->assertForbidden();
});
