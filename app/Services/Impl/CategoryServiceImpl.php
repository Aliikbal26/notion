<?php

namespace App\Services\Impl;

use App\Models\Category;
use App\Models\Todo;
use App\Services\CategoryService;
use Dotenv\Util\Str;
use Illuminate\Support\Facades\Auth;

class CategoryServiceImpl implements CategoryService
{
    public function getCategory(): array
    {
        // $user_id = Auth::id();
        // return Todo::with('user', 'category')
        //     ->where('user_id', $user_id)
        //     ->get()
        //     ->toArray();
        return Category::with('todoes')->get()->toArray();
    }
    public function saveCategory(string $name_category, string $description): void
    {
        $category = new Category([
            "name_category" => $name_category,
            "description" => $description
        ]);
        $category->save();
    }

    public function removeCategory(string $category_id)
    {
        $category = Category::query()->find($category_id);
        if ($category != null) {
            $category->delete();
        }
    }
}
