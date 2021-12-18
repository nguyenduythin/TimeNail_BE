<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    use HasFactory;

    protected $table = 'categories_gallery';

    public $fillable = ['title'];

    public function gallery(){
        return $this->hasMany(Gallery::class,'cate_gl_id');
    }
    public function cate_gallery(){
        return $this->belongsTo(Gallery::class,'cate_gl_id');
    }
}
