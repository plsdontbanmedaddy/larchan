<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = ['board_id', 'title', 'content'];

    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}