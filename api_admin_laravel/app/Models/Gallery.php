<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'galleries';
    public $fillable = ['cate_gl_id'];

    public function cate_gallery(){
        return $this->belongsTo(GalleryCategory::class,'cate_gl_id');
    }
}
