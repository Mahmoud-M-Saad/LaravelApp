<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'description',
        'image',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(related: User::class);
    }

    public function comments(): MorphMany
    {
        return $this-> morphMany(Comment::class, 'commentable');

    }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }


}
