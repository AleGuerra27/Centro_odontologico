<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    protected $table = 'hours';
    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
