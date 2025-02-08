<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Safari extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'date','pickup_location','dropoff_location','contact_number','car_number','jeep_number','pickup_time'];

}
