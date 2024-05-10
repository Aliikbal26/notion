<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Priority extends Model
{
    protected $table = "priorities";
    // protected $primaryKey = "id_priority";
    protected $keyType = "string";
    protected $fillable = [
        "id",
        "name",
        "description"
    ];

    public function todoes(): HasMany
    {
        return $this->hasMany(Todo::class);
    }

    public $timestamps = true;
}
