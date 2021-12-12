<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';
    public $fillable = ['comment', 'number_star', 'user_id', 'service_id', 'combo_id'];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
