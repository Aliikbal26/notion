<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Priority;
use App\Models\Todo;
use App\Models\User;
use App\Services\TodoListService;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    //
    private TodoListService $todolistService;

    public function __construct(TodoListService $todolistService)
    {
        $this->todolistService = $todolistService;
    }

    public function todo()
    {
        $todolist = $this->todolistService->getTodolist();
        $user = Auth::user()->name;
        return response()->view("template.landingPage", [
            "title" => "Home",
            "todolist" => $todolist,
            "name" => $user
        ]);
    }

    public function todoList(Request $request)
    {
        $todolist = $this->todolistService->getTodolist();

        $prioritas = Priority::all();
        $category = Category::all();
        return response()->view("todolist.todolist", [
            "title" => "Todolist",
            "todolist" => $todolist,
            "priority" => $prioritas,
            "category" => $category
        ]);
    }

    public function addTodo(Request $request)
    {

        $todo = $request->input("todo");
        $description = $request->input("description");
        $deadline = $request->input("deadline");
        $priority = $request->input("priority");
        $category = $request->input("category");
        $idUser = Auth::id();

        if (empty($todo)) {
            $todolist = $this->todolistService->getTodolist();
            return response()->view("todolist.todolist", [
                "title" => "Todolist",
                "todolist" => $todolist,
                "error" => "Todo is required"
            ]);
        }

        $this->todolistService->saveTodo($todo, $description, $deadline, $idUser, $priority, $category);

        return redirect()->action([TodoListController::class, 'todoList']);
    }

    public function removeTodo(Request $request, string $todoId): RedirectResponse
    {
        $this->todolistService->removeTodo($todoId);
        return redirect()->action([TodoListController::class, 'todoList']);
    }

    public function editTodo(Request $request, string $todoId)
    {

        $prioritas = Priority::all();
        $category = Category::all();
        $todolist = $this->todolistService->findTodoById($todoId);
        return view("todolist.update", [
            "title" => "Todolist",
            "todo" => $todolist,
            "priorities" => $prioritas,
            "categories" => $category
        ]);
    }

    public function updateTodo(Request $request, string $todoId)
    {
        $todo = $request->input("todo");
        $description = $request->input("description");
        $status = $request->input("status");
        $deadline = $request->input("deadline");
        $priority = $request->input("priority");
        $category = $request->input("category");

        if (empty($todo)) {
            $todolist = $this->todolistService->getTodolist();
            return response()->view("todolist.update", [
                "title" => "Todolist",
                "todolist" => $todolist,
                "error" => "Todo is required"
            ]);
        }
        $this->todolistService->updateTodo($todoId, $todo, $description, $status, $deadline, $priority, $category);
        return redirect()->action([TodoListController::class, 'todoList']);
    }

    public function findTodolist(string $todoId)
    {
        $todolist = $this->todolistService->findTodoById($todoId);
        return view("todolist.details", [
            "title" => "Todolist",
            "todolist" => $todolist,

        ]);
    }
}
