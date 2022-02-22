<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Others extends Model
{
    use HasFactory;
    protected $table = "other_info";

    protected $guarded = [];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
