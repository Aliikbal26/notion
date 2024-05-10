<?php

namespace App\Services;

interface TodoListService
{

    public function saveTodo(string $todo, string $description, string $deadline, string $user_id, string $priority_id, string $category_id): void;

    public function getTodolist(): array;

    public function findTodoById(string $todoId);

    public function removeTodo(string $todoId);

    public function updateTodo(string $todoId, string $newTodo, string $description, string $status, string $deadline, string $priority_id, string $category_id);
}
