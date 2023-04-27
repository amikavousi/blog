<?php

namespace PostApp\Models;

use App\Models\User;
use CategoryApp\Model\Category;
use CommentApp\Model\Comment;
use Illuminate\Database\Eloquent\Builder;
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

    protected $fillable = ['title', 'slug', 'description', 'summery'];
    protected $with = ['category', 'author'];

    protected $appends = ['published_at'];

    public function getPublishedAtAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function scopeFilter(Builder $query, array $request)
    {
        $query->when($request['search'] ?? false, function (Builder $query, $request) {
            $query->where(function (Builder $query) {
                $query->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('description', 'like', '%' . request('search') . '%')
                    ->orWhere('summary', 'like', '%' . request('search') . '%')
                    ->orWhereHas('category', function (Builder $query) {
                        $query->where('title', 'like', '%' . request('search') . '%');
                    })
                    ->orWhereHas('author', function (Builder $query) {
                        $query->where('name', 'like', '%' . request('search') . '%');
                    });
            });
        })->when($request['category'] ?? false, function (Builder $query) {
            $query->whereHas('category', function (Builder $query) {
                $query->where('slug', request('category'));
            });
        })->when($request['author'] ?? false, function (Builder $query) {
            $query->whereHas('author', function (Builder $query) {
                $query->where('username', request('author'));
            });
        });
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
