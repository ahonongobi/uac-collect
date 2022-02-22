<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function uacStructures()
    {
        return $this->belongsToMany(UacStructure::class);
    }

    public function uacEntities()
    {
        return $this->belongsToMany(UacEntity::class);
    }

    public function otherUacStructuresImplies()
    {
        return $this->belongsToMany(OtherUacStructuresImply::class);
    }

    public function impactStructures()
    {
        return $this->hasMany(ImpactStructure::class);
    }

    public function impactUacs()
    {
        return $this->hasMany(ImpactUac::class);
    }

    public function falloutStrucures()
    {
        return $this->hasMany(FalloutStructure::class);
    }

    public function falloutUacs()
    {
        return $this->hasMany(FalloutUac::class);
    }
}
