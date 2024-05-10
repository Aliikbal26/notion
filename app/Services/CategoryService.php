<?php

namespace App\Services;

interface CategoryService
{
    public function getCategory(): array;

    public function saveCategory(string $name_category, string $description): void;

    public function removeCategory(string $category_id);
}
