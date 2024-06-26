<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = new Category();
        $category->id = "1";
        $category->name_category = "School";
        $category->description = "Description Category Untuk Sekolah";
        $category->save();
        $category = new Category();
        $category->id = "2";
        $category->name_category = "Work";
        $category->description = "Description Category Untuk Pekerjaan";
        $category->save();
    }
}
