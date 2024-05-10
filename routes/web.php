<?php

use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/landingPage", function () {
    return view("users.welcome", [
        "title" => "Halaman Profile",
        "name" => "Ali Ikbal",
        "age" => "22 Tahun",
        "tema" => "Full Stack Developer",
        "pelatihan" => "Jabar Digital Academy X Alkademi",
        "about" => "I, Ali Ikbal, am a passionate final-year student who is ready to bring positive energy to the
        professional world. With a background in informatics engineering, I have gained a solid
        understanding of programming and computer science as well as the practical skills
        necessary to thrive in the workforce according to my working interest in Software Engineer"
    ]);
});

Route::get('/', [HomeController::class, 'home']);

Route::controller(\App\Http\Controllers\UserController::class)->group(function () {
    Route::get('/login', 'login')->middleware([\App\Http\Middleware\OnlyGuestMiddleware::class]);
    Route::get('/registrasi', 'registrasi')->middleware([\App\Http\Middleware\OnlyGuestMiddleware::class]);
    Route::post('/registrasi', 'addUser')->middleware([\App\Http\Middleware\OnlyGuestMiddleware::class]);
    Route::post('/login', 'doLogin')->middleware([\App\Http\Middleware\OnlyGuestMiddleware::class]);
    Route::post('/logout', 'doLogout')->middleware([\App\Http\Middleware\OnlyMemberMiddleware::class]);
});

Route::controller(\App\Http\Controllers\TodoListController::class)
    ->middleware([\App\Http\Middleware\OnlyMemberMiddleware::class])->group(function () {
        Route::get('/home', 'todo');
        Route::get('/todolist', 'todoList');
        Route::post('/todolist', 'addTodo');
        Route::post('/todolist/{id}/delete', 'removeTodo');
        Route::get('/todolist/{id}/edit', 'editTodo');
        Route::put('/todolist/{id}/edit', 'updateTodo');
        Route::get('/todolist/{id}/details', 'findTodolist');
    });
Route::controller(\App\Http\Controllers\CategoryController::class)
    ->middleware([\App\Http\Middleware\OnlyMemberMiddleware::class])->group(function () {
        Route::get('/category', 'category');
        Route::post('/category', 'addCategory');
        Route::post('/category/{id}/delete', 'removeCategory');
    });
Route::controller(\App\Http\Controllers\PriorityController::class)
    ->middleware([\App\Http\Middleware\OnlyMemberMiddleware::class])->group(function () {
        Route::get('/priority', 'priority');
        Route::post('/priority', 'addPriority');
        Route::post('/priority/{id}/delete', 'removePriority');
    });
