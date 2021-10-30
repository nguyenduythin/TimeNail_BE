<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    public $fillable = ['title', 'description', 'cate_blog_id', 'user_id'];
    public function blogTag(){
        return $this->belongsToMany(Tag::class, 'blog_tag', 'blog_id', 'tag_id')->select('name_tag');
    }
    public function blogUser(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function categoryBlog(){
        return $this->belongsTo(BlogCategory::class, 'cate_blog_id');
    }
}
