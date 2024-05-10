<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = "categories";
    // protected $primaryKey = "id_category";
    protected $keyType = "string";
    protected $guarded = [];
    // public $fillable = [
    //     "id",
    //     "name_category",
    //     "description"
    // ];

    public function todoes(): HasMany
    {
        return $this->hasMany(Todo::class);
    }

    public $timestamps = true;
}
