<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeGroup extends Model
{
    use HasFactory;

    public function sizeTypes(){
        return $this->belongsToMany(SizeType::class);
    }
}
