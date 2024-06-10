<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class PostAttachable extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "user_id",
        "post_attachable_type",
        "post_attachable_id",
        "type",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function isTypeOf(string $className): bool
    {
        return $this->attachable_type === $className;
    }

    public function poll(): MorphTo
    {
        return $this->morphTo();
    }

    public function embed(): MorphTo
    {
        return $this->morphTo();
    }
}
