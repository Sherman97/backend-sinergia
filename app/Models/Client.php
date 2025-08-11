<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'client_type_id',
        'geo_scope_id',
    ];

    // Relations
    public function type()
    {
        return $this->belongsTo(ClientType::class, 'client_type_id');
    }

    public function scope()
    {
        return $this->belongsTo(GeoScope::class, 'geo_scope_id');
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
