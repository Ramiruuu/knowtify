<?php

use App\Models\Note;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('requires authentication to access notes', function () {
    $this->getJson('/api/notes')->assertStatus(401);
});

it('allows owner to perform CRUD on notes', function () {
    $user = User::factory()->create();

    $this->actingAs($user, 'sanctum');

    // create
    $create = $this->postJson('/api/notes', [
        'title' => 'Test note',
        'content' => 'Hello world',
    ]);

    $create->assertStatus(201)
        ->assertJsonPath('data.title', 'Test note');

    $id = $create->json('data.id');

    // index
    $this->getJson('/api/notes')->assertStatus(200)->assertJsonCount(1, 'data');

    // update
    $this->putJson("/api/notes/{$id}", ['title' => 'Updated'])->assertStatus(200)
        ->assertJsonPath('data.title', 'Updated');

    // delete
    $this->deleteJson("/api/notes/{$id}")->assertStatus(204);

    $this->getJson('/api/notes')->assertStatus(200)->assertJsonCount(0, 'data');
});

it('prevents other users from modifying notes they do not own', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();

    $note = Note::factory()->for($owner)->create(['title' => 'secret']);

    $this->actingAs($other, 'sanctum');

    $this->putJson("/api/notes/{$note->id}", ['title' => 'hacked'])->assertStatus(403);
    $this->deleteJson("/api/notes/{$note->id}")->assertStatus(403);
});
