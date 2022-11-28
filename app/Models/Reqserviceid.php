<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reqserviceid extends Model
{
    use HasFactory;
    protected $fillable = ['servicereq_id', 'service_id'];
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
