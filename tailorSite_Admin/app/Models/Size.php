<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    public function sizable()
    {
        return $this->morphTo();
    }

    public function sizeType()
    {
        return $this->belongsTo(SizeType::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
