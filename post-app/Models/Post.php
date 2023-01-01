<?php

namespace PostApp\Models;

use App\Models\Category;
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

    protected $fillable = ['title', 'description', 'published_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
