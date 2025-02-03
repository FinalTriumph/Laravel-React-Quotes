<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quote extends Model
{
    /** @use HasFactory<\Database\Factories\QuoteFactory> */
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'text',
        'author',
        'source'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
