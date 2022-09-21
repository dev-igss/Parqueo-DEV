<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'assignments';
    protected $hidden = ['created_at', 'updated_at'];

    public function parking_lot(){
        return $this->hasOne(ParkingLot::class,'id', 'parking_lot_id');
    }
}
