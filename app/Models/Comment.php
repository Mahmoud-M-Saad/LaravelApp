<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_body',
        'user_id',
        'post_id',
        'file_path',
        'created_at',
    ];

    public function commentable():MorphTo
    {
        return $this-> morphTo();
    }
    public function user()
    {
        return $this-> belongsTo(related: User::class);
    }

    // public function post()
    // {
    //     return $this-> belongsTo(Post::class);
    // }
}
