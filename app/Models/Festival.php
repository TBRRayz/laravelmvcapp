<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Festival extends Model
{
    public function festivalProfile(): HasOne
    {
        return $this->hasOne(FestivalProfile::class);
    }
}
