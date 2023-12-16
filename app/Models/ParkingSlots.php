<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingSlots extends Model
{
    use HasFactory;

    protected $table = 'parking_slots';
    protected $primaryKey = 'id';

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function multimg()
    {
        return $this->hasMany(ParkingImage::class, 'parking_id', 'id');
    }
}
