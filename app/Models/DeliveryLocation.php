<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryLocation extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'location',
        'geo_scope_id',
        'transport_type_id',
        'capacity',
        'current_occupancy',
    ];

    // Relations
    public function scope()
    {
        return $this->belongsTo(GeoScope::class, 'geo_scope_id');
    }

    public function transportType()
    {
        return $this->belongsTo(TransportType::class, 'transport_type_id');
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    public function geoScope()
    {
        return $this->belongsTo(GeoScope::class);
    }


}
