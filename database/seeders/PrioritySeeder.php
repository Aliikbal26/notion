<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $priority = new Priority();
        $priority->id = "1";
        $priority->name = "Second";
        $priority->description = "Description Priotity";
        $priority->save();
    }
}
