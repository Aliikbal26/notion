<?php

namespace Database\Seeders;

use App\Models\Todo;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $todo = new Todo();
        $todo->id = "1";
        $todo->todo = "Ali";
        $todo->description = "Description Ali";
        $todo->deadline = "26 April 2024";
        $todo->status = "On Progress";
        $todo->user_id = "1";
        $todo->category_id = "1";
        $todo->priority_id = "1";
        $todo->save();
        $todo = new Todo();
        $todo->id = "2";
        $todo->todo = "Todo 2";
        $todo->description = "Description Todo 2";
        $todo->deadline = "26 April 2024";
        $todo->status = "On Progress";
        $todo->user_id = "2";
        $todo->category_id = "1";
        $todo->priority_id = "1";
        $todo->save();
    }
}
