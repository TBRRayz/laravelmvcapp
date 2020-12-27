<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class FestivalProfile extends Model
{
    public function festival(): BelongsTo
    {
        return $this->belongsTo(Festival::class);
    }
}
