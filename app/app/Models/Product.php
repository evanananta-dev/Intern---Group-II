<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'transmission',
        'passenger_capacity',
        'fuel_type',
        'production_year',
        'engine',
        'license_plate',
        'price_per_day',
        'status',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

}
