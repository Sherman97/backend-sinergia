<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'product_type_id',
        'transport_type_ids',
        'requires_special_handling',
    ];

    protected $casts = [
        'transport_type_ids' => 'array',
        'requires_special_handling' => 'boolean',
    ];

    // Relations
    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
