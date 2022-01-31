<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_document extends Model
{
    protected $with = ['affectation_igv_type'];
    public $timestamps = false;

    protected $fillable = [
        'document_id',
        'item_id',
        'item',
        'quantity',
        'unit_value',

        'affectation_igv_type_id',
        'total_base_igv',
        'percentage_igv',
        'total_igv',

        'total_base_isc',
        'percentage_isc',
        'total_isc',

        'total_base_other_taxes',
        'percentage_other_taxes',
        'total_other_taxes',
        'total_taxes',

        'unit_price',

        'total_value',
        'total_charge',
        'total_discount',
        'total',

        'attributes',
        'charges',
        'discounts',
        'total_plastic_bag_taxes',
        'warehouse_id',
        'additional_information'
    ];
    public function affectation_igv_type()
    {
        return $this->belongsTo(Affectation_igv_type::class, 'affectation_igv_type_id');
    }
    public function document()
    {
        return $this->belongsTo(Document::class);
    }
    public function relation_item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
