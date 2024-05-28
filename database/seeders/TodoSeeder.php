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
        $todo->todo = "Belajar Java Dasar";
        $todo->description = "Belajar Dasar Dasar pemrograman menggunakan bahasa java bersama Programmer Zaman Now";
        $todo->deadline = "2024-05-26";
        $todo->status = "On Progress";
        $todo->user_id = "1";
        $todo->category_id = "1";
        $todo->priority_id = "1";
        $todo->save();
        $todo = new Todo();
        $todo->id = "2";
        $todo->todo = "Belajar Spring Framework";
        $todo->description = "Belajar Dasar Dasar Framework SpringBoot menggunakan bahasa java bersama Programmer Zaman Now";
        $todo->deadline = "2024-05-12";
        $todo->status = "On Progress";
        $todo->user_id = "2";
        $todo->category_id = "2";
        $todo->priority_id = "2";
        $todo->save();
    }
}
