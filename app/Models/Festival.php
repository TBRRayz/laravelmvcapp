<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Festival extends Model
{
    protected $fillable = [
        'festivalName',
        'title',
        'description',
        'genre',
        'url',
        'festivalImage',
    ];

    public function festivalProfile(): HasOne
    {
        return $this->hasOne(FestivalProfile::class);
    }

    public function checkIns(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
