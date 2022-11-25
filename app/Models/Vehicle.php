<?php

namespace App\Models;

use App\Models\VehicleCategory;
use App\Models\Customer;
use App\Models\VehicleBrand;
use App\Models\VehicleColor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'customer_id',
        'price',
        'vehicle_color_id',
        'vehicle_brand_id',
        'vehicle_category_id',
        'engin_num',
        'image',
        'num_plate',
        'chasis_num',
        'model_year',
    ];

    public function category()
    {
        return $this->belongsTo(VehicleCategory::class, 'vehicle_category_id');
    }
    public function owner()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function color()
    {
        return $this->belongsTo(VehicleColor::class, 'vehicle_color_id');
    }
    public function brand()
    {
        return $this->belongsTo(VehicleBrand::class, 'vehicle_brand_id');
    }
}
