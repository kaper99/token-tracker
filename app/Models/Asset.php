<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asset extends Model
{
    use HasFactory;

    public function name(): Attribute
    {
        return Attribute::make(
           fn() => $this->token->currency,
        );
    }

    public function token(): BelongsTo
    {
        return $this->belongsTo(Token::class);
    }
}
