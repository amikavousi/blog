<?php

namespace CategoryApp\Model;

use CategoryApp\factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PostApp\Models\Post;

class Category extends Model
{
    use HasFactory;

    static function newFactory()
    {
        return new CategoryFactory();
    }

    protected $fillable = ['title', 'slug'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
