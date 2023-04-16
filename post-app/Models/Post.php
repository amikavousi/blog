<?php

namespace PostApp\Models;

use App\Models\User;
use CategoryApp\Model\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PostApp\Factories\PostFactory;

class Post extends Model
{
    use HasFactory;

    static function newFactory(): PostFactory
    {
        return PostFactory::new();
    }

    protected $fillable = ['title', 'slug', 'description', 'published_at'];
    protected $with = ['category', 'author'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
