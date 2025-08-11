<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'product_id',
        'delivery_location_id',
        'transport_type_id',
        'quantity',
        'unit_price',
        'discount_percent',
        'final_price',
        'guide_number',
        'tracking_code',
        'registered_at',
        'estimated_delivery',
        'delivered_at',
        'vehicle_plate',
        'fleet_number',
    ];

    // Casting de fechas y números
    protected $casts = [
        'registered_at'      => 'datetime',
        'estimated_delivery' => 'datetime',
        'delivered_at'       => 'datetime',
        'unit_price'         => 'decimal:2',
        'discount_percent'   => 'decimal:2',
        'final_price'        => 'decimal:2',
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function deliveryLocation(){
        return $this->belongsTo(DeliveryLocation::class);
    }

    public function transportType(){
        return $this->belongsTo(TransportType::class);
    }

}
