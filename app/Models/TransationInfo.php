<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransationInfo extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'transation_infos';   
}
