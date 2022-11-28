<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicereq extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'reqservice_id',
        'transaction_id',
        'mechanic_id',
        'deadline',
        'payment',
        'status',
        'description'
    ];
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function owner()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function mechanic()
    {
        return $this->belongsTo(Mechanic::class, 'mechanic_id');
    }
    public function req_service_list()
    {
        return $this->hasMany(Reqserviceid::class, 'servicereq_id');
    }
}
