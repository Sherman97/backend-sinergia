<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeoScope extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'customs_required',
    ];

    protected $casts = [
        'customs_required' => 'boolean',
    ];

    // Relations
    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function deliveryLocations()
    {
        return $this->hasMany(DeliveryLocation::class);
    }



}
