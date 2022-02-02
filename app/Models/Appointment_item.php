<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment_item extends Model
{
    protected $with = ['affectation_igv_type'];
    public $timestamps = false;

    protected $fillable = [
        'appointment_id',
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

        'discounts',
        'total_plastic_bag_taxes',
    ];
    
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
    
    public function relation_item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
    
    public function affectation_igv_type()
    {
        return $this->belongsTo(Affectation_igv_type::class, 'affectation_igv_type_id');
    }
}
