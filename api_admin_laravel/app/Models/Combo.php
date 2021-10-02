<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    use HasFactory;

    protected $table = 'combo';

    protected $fillable = [
        'name_combo',
        'total_time_work',
        'image',
        'total_price',
        'short_description',
        'description',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
