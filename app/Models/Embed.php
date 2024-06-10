<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Embed extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ["user_id", "type", "url", "title", "description"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function postAttachable(): MorphOne
    {
        return $this->morphOne(PostAttachable::class, "post_attachable");
    }
}
