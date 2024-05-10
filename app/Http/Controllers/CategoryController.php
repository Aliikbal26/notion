<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function category()
    {
        $category = $this->categoryService->getCategory();
        return response()->view("category.category", [
            "title" => "Category",
            "category" => $category

        ]);
    }

    public function addCategory(Request $request)
    {
        $name_category = $request->input("name_category");
        $description = $request->input("description");

        if (empty($name_category)) {
            $category = $this->categoryService->getCategory();
            return response()->view("category.category", [
                "title" => "Todolist",
                "category" => $category,
                "error" => "Todo is required"
            ]);
        }
        $this->categoryService->saveCategory($name_category, $description);
        return redirect()->action([CategoryController::class, 'category']);
    }
}
