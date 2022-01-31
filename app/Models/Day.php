<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $table = 'days';
    protected $with = 'hour';
    public function hour()
    {
        return $this->hasMany(Hour::class,'day_id');
    }
}
