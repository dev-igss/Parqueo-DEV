<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParkingLot extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'parking_lots';
    protected $hidden = ['created_at', 'updated_at'];

    public function security(){
        return $this->hasOne(SecurityCheckpoint::class,'id', 'security_checkpoint_id');
    }

}
