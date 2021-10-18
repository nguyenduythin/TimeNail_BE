<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bills';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function staff(){
        return $this->belongsToMany(User::class,'bill_staff','bill_id','staff_id');
    }

    public function service(){
        return $this->belongsToMany(Service::class);
    }
    public function combo(){
        return $this->belongsToMany(Combo::class);
    }
}
