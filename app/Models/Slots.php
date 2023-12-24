<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slots extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'slots';
    public function parkingSlots(){
        return $this->hasOne(ParkingSlots::class, 'id', 'slot_id');
    }
    public function info(){
        return $this->hasOne(TransationInfo::class, 'slot_number', 'slot_number');
    }
    
}
