<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_a_task()
    {
        $response = $this->postJson('/api/tasks', [
            'title' => 'Test Task',
            'description' => 'From unit test',
            'status' => 'todo',
            'due_date' => now()->addDays(3)->toDateString(),
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'title' => 'Test Task',
                     'status' => 'todo'
                 ]);
    }

    public function test_can_list_tasks()
    {
        Task::factory()->create(['title' => 'Sample Task 1']);
        Task::factory()->create(['title' => 'Sample Task 2']);

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200)
                 ->assertJsonStructure(['data', 'current_page', 'last_page']);
    }

    public function test_can_update_a_task()
    {
        $task = Task::factory()->create(['title' => 'Old Title']);

        $response = $this->putJson("/api/tasks/{$task->id}", [
            'title' => 'Updated Title',
            'description' => $task->description,
            'status' => $task->status,
            'due_date' => $task->due_date,
        ]);

        $response->assertStatus(200)
                 ->assertJson(['title' => 'Updated Title']);
    }

    public function test_can_delete_a_task()
    {
        $task = Task::factory()->create();

        $response = $this->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
