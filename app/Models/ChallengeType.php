<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // questions moved to bootcamp
/*     public function questions()
    {
        return $this->hasMany(ChallengeQuestion::class);
    } */
}
