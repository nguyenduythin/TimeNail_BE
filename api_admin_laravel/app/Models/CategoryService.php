<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryService extends Model
{
    use HasFactory;

    protected $table = 'categories_service';

    protected $fillable = [
        'name_cate_service',
        'image',
        'note',
    ];

    public function services(){
        return $this->hasMany(Service::class,'cate_service_id');
    }
}
