<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    protected $fillable = [
        'title',
        'description',
        'url',
        'password',
        'image',
    ];

    public function userProfileImage()
    {
        $imagePath = ($this->image) ? '/storage/app/public' . $this->image : '/storage/userProfile/CuPx630800AFBoBxWyFyWHHPAAIBw3T54kH49Ciz.png';
        return $imagePath;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
