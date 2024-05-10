<?php

namespace App\Services\Impl;

use App\Models\Priority;
use App\Services\PriorityService;

class PriorityServiceImpl implements PriorityService
{
    public function savePriority(string $name, string $description): void
    {
        $priority = new Priority([
            'name' => $name,
            'description' => $description
        ]);
        $priority->save();
    }

    public function getPriority(): array
    {
        return Priority::query()->get()->toArray();
    }
}
