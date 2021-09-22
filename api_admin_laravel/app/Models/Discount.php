<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'code_discounts';

    protected $fillable = [
        'code_discount',
        'image',
        'percent',
        'quantity',
    ];


}
