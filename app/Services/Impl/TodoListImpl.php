<?php

namespace App\Services\Impl;

use App\Models\Todo;
use App\Services\TodoListService;
use Illuminate\Support\Facades\Auth;

class TodoListImpl implements TodoListService
{

    public function saveTodo(string $todo, string $description, string $deadline, string $user_id, string $priority_id, string $category_id): void
    {
        $todo = new Todo([
            "todo" => $todo,
            "description" => $description,
            "deadline" => $deadline,
            "user_id" => $user_id,
            "priority_id" => $priority_id,
            "category_id" => $category_id
        ]);
        $todo->save();
    }

    public function getTodolist(): array
    {
        $idUser = Auth::id();
        return Todo::with('category', 'priority')->where(['user_id' => $idUser])->get()->toArray();
    }

    public function removeTodo(string $todoId)
    {
        $todo = Todo::query()->find($todoId);
        if ($todo != null) {
            $todo->delete();
        }
    }

    public function findTodoById(string $todoId)
    {
        $findTodo = Todo::with('category', 'priority')->where(['id' => $todoId])->find($todoId);
        if ($findTodo != null) {
            return $findTodo;
        }
    }


    public function updateTodo(string $todoId, string $newTodo, string $description, string $deadline, string $priority_id, string $category_id)
    {
        $todo = $this->findTodoById($todoId);
        if ($todo != null) {
            $todo->todo = $newTodo;
            $todo->description = $description;
            $todo->deadline = $deadline;
            $todo->priority_id = $priority_id;
            $todo->category_id = $category_id;
            if ($deadline > now()->format('Y-m-d') && $todo->status = "Failed") {
                $todo->status = 'On Progress';
            }
            $todo->save();
        }
    }

    public function updateStatus(string $todoId, string $newStatus)
    {
        // $todo = $this->findTodoById($todoId);
        $todo = Todo::find($todoId);

        if ($todo != null) {
            $todo->status = $newStatus;
            $todo->save();
        }
    }
    public function deadline(string $todoId)
    {
        $deadline = Todo::where('deadline', '<', now()->format('Y-m-d'))
            ->where('status', 'On Progress')
            ->get();
        foreach ($deadline as $deadlines) {
            $deadlines->status = "Failed";
            $deadlines->save();
        }
    }
}
