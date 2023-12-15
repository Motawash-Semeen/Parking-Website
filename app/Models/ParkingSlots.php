<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingSlots extends Model
{
    use HasFactory;

    protected $table = 'parking_slots';
    protected $primaryKey = 'id';
}
