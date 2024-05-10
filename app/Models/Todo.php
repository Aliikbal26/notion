<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    protected $table = "todoes";
    // protected $primaryKey = "id";
    // protected $keyType = "string";
    protected $guarded = [];

    protected $attributes = [
        'status' => 'On Progress'
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function priority(): BelongsTo
    {
        return $this->belongsTo(Priority::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public $timestamps = true;
}
