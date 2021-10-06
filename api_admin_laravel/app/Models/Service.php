<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'name_service',
        'price',
        'total_time_work',
        'short_description',
        'cate_service_id',
    ];

    public function cate_service(){
        return $this->belongsTo(CategoryService::class,'cate_service_id');
    }
}
