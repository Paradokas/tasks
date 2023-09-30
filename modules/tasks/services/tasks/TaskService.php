<?php

namespace app\modules\tasks\services\tasks;

class TaskService
{
    public function __construct(
        private readonly CreateTask $createTask,
        private readonly DeleteTask $deleteTask
    )
    {
    }
    public function createTask($task): bool
    {
       return $this->createTask->handle($task);
    }

    public function deleteTask($task): bool
    {
        return $this->deleteTask->handle($task);
    }
}