<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransationInfo extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'transation_infos';   
    public function users(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function slots(){
        return $this->hasOne(ParkingSlots::class, 'id', 'slot_id');
    }
    public function reviews(){
        return $this->hasMany(Review::class, 'transaction_id', 'id');
    }
    public function info(){
        return $this->hasOne(Slots::class, 'id', 'slot_id');
    }

}
