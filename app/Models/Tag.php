<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ["user_id", "name", "alias"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, "taggable");
    }
}
