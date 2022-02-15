<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeType extends Model
{
    use HasFactory;
    protected $fillable=["name"];
    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    public function sizeGroups()
    {
        return $this->belongsToMany(SizeGroup::class);
    }
}
