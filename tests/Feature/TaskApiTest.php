<?php

use App\Models\Task;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

test('list tasks', function () {
    getJson('/api/tasks')->assertOk();
});

test('create a task', function () {

    postJson('/api/tasks', [
        'title'=> "hello",
        'description'=> "world",
    ])->assertCreated();

    assertDatabaseHas('tasks', [
        'title'=> "hello",
        'description'=> "world",
    ]);
});

test('validates title on store', fn () =>
    postJson('/api/tasks', [
        'description'=> "world",
    ])->assertUnprocessable()
);

test('shows a task', function () {
    $task = Task::factory()->create();
    getJson("/api/tasks/{$task->id}")->assertOk();
});

test('returns 404 for missing task', function () {
    getJson('/api/tasks/9999')->assertNotFound();
});

test('updates a task', function () {
    $task = Task::factory()->create(['status' => 'todo']);
    putJson("/api/tasks/{$task->id}", [
        'title' => 'task is done',
        'status' => 'done'
    ])->assertOk();
});

test('delete a task', function () {
    $task = Task::factory()->create();
    deleteJson("/api/tasks/{$task->id}")->assertNoContent();
});

test('filters by status', function () {
    $todos = Task::factory(3)->create(['status' => 'todo']);
    $dones = Task::factory(2)->create(['status'=> 'done']);

    getJson('/api/tasks?status=todo')->assertJsonCount(3, 'data');
});
