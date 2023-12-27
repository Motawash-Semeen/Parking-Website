<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = "reviews";
    protected $primarykey = "id";

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function transaction()
    {
        return $this->hasOne(TransationInfo::class, 'id', 'transaction_id');
    }
}
