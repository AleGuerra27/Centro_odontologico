<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_warehouse extends Model
{
    protected $table = 'item_warehouse';

    protected $fillable = [
        'item_id',
        'warehouse_id', 
        'stock', 
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
