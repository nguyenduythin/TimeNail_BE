<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComboService extends Model
{
    use HasFactory;

    protected $table = 'combo_service';

    protected $fillable = [
        'service_id',
        'combo_id',
    ];
}
