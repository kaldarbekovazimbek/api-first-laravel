<?php

namespace App\Http\Controllers;

use App\DTO\TaskDto;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResourse;
use App\Models\Task;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::query()->get();

        return TaskResourse::collection($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request): TaskResourse
    {
        $dto = TaskDto::fromArray($request->validated());

        $task = new Task();
        $task->title = $dto->getTitle();
        $task->description = $dto->getDescription();
        $task->priority = $dto->getPriority();
        $task->status = $dto->getStatus();

        $task->save();

        return new TaskResourse($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): TaskResourse
    {
        $task = Task::query()->where('id', $id)->first();

        if (!$task) {
            throw new NotFoundResourceException('Task not found');
        }

        return new TaskResourse($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, int $id): TaskResourse
    {
        $dto = TaskDto::fromArray($request->validated());

        $task = Task::query()->where('id', $id)->first();

        if (!$task) {
            throw new NotFoundResourceException('Task not found');
        }

        $task->title = $dto->getTitle();
        $task->description = $dto->getDescription();
        $task->priority = $dto->getPriority();
        $task->status = $dto->getStatus();
        $task->save();

        return new TaskResourse($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $id)
    {
        $task = Task::query()->where('id', $id)->first();
        if (!$task) {
            throw new NotFoundResourceException('Task not found');
        }
        $task->delete();

        return response(['message'=>'Success'], 204);
    }
}
