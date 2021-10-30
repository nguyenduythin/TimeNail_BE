<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderShow extends Model
{
    use HasFactory;
    protected $table = 'slider_show';
    public $fillable = ['name_slider', 'show_image'];
}
