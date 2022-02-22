<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function suggestions()
    {
        return $this->hasMany(Suggestion::class);
    }

    public function other()
    {
        return $this->hasMany(Others::class);
    }
}
