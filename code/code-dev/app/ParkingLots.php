<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingLots extends Model
{
    use HasFactory;

    protected $table = 'parking_lots';
    protected $hidden = ['created_at', 'updated_at'];
}
