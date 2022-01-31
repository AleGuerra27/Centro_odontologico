<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit_type extends Model
{
    protected $table = "unit_types";
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id' => 'string',
        'active',
        'symbol',
        'description',
    ];
}
