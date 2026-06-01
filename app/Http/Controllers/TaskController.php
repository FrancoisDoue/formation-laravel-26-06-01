<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        return response()->json(
            Task::query()
                ->when(request('status'), fn($q, $status) => $q->where('status', $status))
                ->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request) : JsonResponse
    {
        return response()->json(Task::create($request->validated()), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task) : JsonResponse
    {
        return response()->json($task, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskRequest $request, Task $task) : JsonResponse
    {
        $task->update($request->validated());
        return response()->json($task, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task) : JsonResponse
    {
        $task->delete();
        return response()->json(null, 204);
    }
}
