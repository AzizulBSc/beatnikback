<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    use HasFactory;
    protected $fillable = [
        'bankid',
        'duration',
        'rate',
    ];
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bankid');
    }
}
