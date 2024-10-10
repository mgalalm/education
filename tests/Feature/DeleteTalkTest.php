<?php

use App\Enums\TalkType;
use App\Models\Talk;
use App\Models\User;

test('use can delete their talk', function () {
    $talk = Talk::factory()->create();
    $id = $talk->id;

    $response = $this
        ->actingAs($talk->author)
        ->delete(route('talks.delete', $talk));

    $response->assertRedirect(route('talks.index'));

    $this->assertDatabaseMissing('talks', [
        'id' => $id,
    ]);
});

test('a user cannot delete a talk of another user', function () {
    $user = User::factory()->create();
    $otherUser = User::factory()->create();

    $talk = $user->talks()->create([
        'title' => fake()->sentence,
        'type' => TalkType::KEYNOTE,
    ]);

    $response = $this
        ->actingAs($otherUser)
        ->delete(route('talks.delete', $talk))
        ->assertForbidden();

    $this->assertDatabaseHas('talks', ['id' => $talk->id]);
});
