<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //protected $with = ['unit_type', 'currency_type', 'warehouse'];
    protected $fillable = [
        'warehouse_id',
        'name',
        'second_name',
        'description',
        'model',
        'internal_id',
        'item_code',
        'item_code_gs1',
        'unit_type_id' => 'string',
        'currency_type_id',
        'sale_unit_price',
        'purchase_unit_price',
        'has_isc',
        'system_isc_type_id',
        'percentage_isc',
        'suggested_price',

        'sale_affectation_igv_type_id',
        'purchase_affectation_igv_type_id',
        'has_igv',

        'stock',
        'stock_min',

        'attributes',
        'amount_plastic_bag_taxes',
        'date_of_due',
        'has_plastic_bag_taxes',
    ];
    public function unit_type()
    {
        return $this->belongsTo(Unit_type::class, 'unit_type_id');
    }

    public function currency_type()
    {
        return $this->belongsTo(Currency_type::class, 'currency_type_id');
    }
    public function sale_affectation_igv_type()
    {
        return $this->belongsTo(Affectation_igv_type::class, 'sale_affectation_igv_type_id');
    }

    public function purchase_affectation_igv_type()
    {
        return $this->belongsTo(Affectation_igv_type::class, 'purchase_affectation_igv_type_id');
    }
    public function warehouses()
    {
        return $this->hasMany(Item_warehouse::class)->with('warehouse');
    }
    public  function document_items()
    {
        return $this->hasMany(Document_item::class, 'item_id');
    }
    public function scopeWhereWarehouse($query)
    {
        $warehouse = Warehouse::all();
        if ($warehouse) {
            return $query->whereHas('warehouses', function($query) use($warehouse) {
                            $query->where('warehouse_id', $warehouse->id);
                        })->orWhere('unit_type_id', 'ZZ');
        }
        return $query;
    }
}
