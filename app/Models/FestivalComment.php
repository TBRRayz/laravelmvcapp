<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FestivalComment extends Model
{
    protected $fillable = [
        'content',
        'user_id',
        'festival_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function festival(): BelongsTo
    {
        return $this->belongsTo(Festival::class);
    }

}
