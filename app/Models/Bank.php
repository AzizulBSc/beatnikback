<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code'
    ];
    public function interest(){
        return $this->hasMany(Interest::class,'bankid');
    }
}
