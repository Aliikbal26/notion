<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Priority;
use App\Models\User;
use App\Services\CategoryService;
use App\Services\PriorityService;
use App\Services\TodoListService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    //
    private TodoListService $todolistService;
    private PriorityService $priorityService;
    private CategoryService $categoryService;

    public function __construct(TodoListService $todolistService, PriorityService $priorityService, CategoryService $categoryService)
    {
        $this->todolistService = $todolistService;
        $this->priorityService = $priorityService;
        $this->categoryService = $categoryService;
    }



    public function todo()
    {
        $todolist = $this->todolistService->getTodolist();

        // Iterasi melalui setiap todo item
        foreach ($todolist as $todo) {
            $todoId = $todo['id'];
            $deadline = $todo['deadline'];
            $status = $todo['status'];

            // Periksa jika deadline sudah lewat dan status masih "On Progress"
            if ($deadline < now()->format('Y-m-d') && $status == 'On Progress') {
                // Perbarui status menjadi "Filed"
                $this->todolistService->updateStatus($todoId, 'Failed');
            }
        }
        $todolist1 = $this->todolistService->getTodolist();
        $id = Auth::id();
        $user = User::query()->where(['id' => $id])->find($id);
        return response()->view("template.landingPage", [
            "title" => "Home",
            "todolist" => $todolist1,
            "name" => $user,
        ]);
    }

    public function todoList()
    {
        // Ambil semua todo list
        $todolist = $this->todolistService->getTodolist();

        // Iterasi melalui setiap todo item
        foreach ($todolist as $todo) {
            $todoId = $todo['id'];
            $deadline = $todo['deadline'];
            $status = $todo['status'];

            // Periksa jika deadline sudah lewat dan status masih "On Progress"
            if ($deadline < now()->format('Y-m-d') && $status == 'On Progress') {
                // Perbarui status menjadi "Failed"
                $this->todolistService->updateStatus($todoId, 'Failed');
            }
        }

        $todolist2 = $this->todolistService->getTodolist();
        $prioritas = $this->priorityService->getPriority();
        $category = $this->categoryService->getCategory();
        return response()->view("todolist.todolist", [
            "title" => "Todolist",
            "todolist" => $todolist2,
            "priority" => $prioritas,
            "category" => $category,
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

        return redirect()->action([TodoListController::class, 'todoList'])->with('success', 'Todo added successfully');
    }

    public function removeTodo(Request $request, string $todoId): RedirectResponse
    {
        $this->todolistService->removeTodo($todoId);
        return redirect()->action([TodoListController::class, 'todoList'])->with('success', 'Todo deleted successfully');
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
        $deadline = $request->input("deadline");
        $priority = $request->input("priority");
        $category = $request->input("category");

        $todolist = $this->todolistService->findTodoById($todoId);
        $statusTodo = $todolist['status'];

        // Periksa jika deadline sudah lewat dan status masih "On Progress"
        if ($deadline >= now()->format('Y-m-d') && $statusTodo == 'Failed') {
            // Perbarui status menjadi "on progress"
            $this->todolistService->updateStatus($todoId, 'On Progress');
        }

        if (empty($todo)) {
            $todolist = $this->todolistService->getTodolist();
            return response()->view("todolist.update", [
                "title" => "Todolist",
                "todolist" => $todolist,
                "error" => "Todo is required"
            ]);
        }
        $this->todolistService->updateTodo($todoId, $todo, $description, $deadline, $priority, $category);
        return redirect()->action([TodoListController::class, 'todoList'])->with('success', 'Todo updated successfully');
    }

    public function findTodolist(string $todoId)
    {
        $todolist = $this->todolistService->findTodoById($todoId);
        return view("todolist.details", [
            "title" => "Todolist",
            "todolist" => $todolist,

        ]);
    }

    public function updateStatus(Request $request, string $todoId)
    {
        $newStatus = $request->input("status");

        if (!empty($newStatus)) {
            $this->todolistService->updateStatus($todoId, $newStatus);
            return redirect()->action([TodoListController::class, 'todoList']);
        }
    }
}
