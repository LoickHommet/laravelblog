<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = ['title', 'description', 'extrait', 'picture'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post', 'id');
    }

    public function countComments()
    {
        return sizeof($this->comments);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'posts_categories', 'post', 'categories');
    }
}
