<?php

namespace App\Services;

interface PriorityService
{
    public function savePriority(string $name, string $description): void;

    public function getPriority(): array;
}
