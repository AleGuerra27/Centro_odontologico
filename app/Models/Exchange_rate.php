<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange_rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'date_original',
        'purchase',
        'purchase_original',
        'sale',
        'sale_original',
    ];
}
