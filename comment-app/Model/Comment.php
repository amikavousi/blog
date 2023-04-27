<?php

namespace CommentApp\Model;

use App\Models\User;
use CommentApp\Factories\CommentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PostApp\Models\Post;

class Comment extends Model
{
    use HasFactory;

    protected $with = ['author'];

    protected $fillable = ['user_id', 'post_id', 'body'];

    protected static function newFactory(): CommentFactory
    {
        return new CommentFactory();
    }

    public function post(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
