<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Articles extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'title', 'categories', 'content', 'user_id', 'likes_count', 'photo', 'created_at', 'updated_at'
    ];



    public function scopeSelection($query)
    {

        return $query->select('id', 'title', 'categories', 'content', 'photo', 'user_id', 'likes_count');
    }


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    
    public function likes()
    {
        return $this->hasMany(ArticleLike::class, 'article_id');
    }
    

    public function comments()
{
    return $this->hasMany(Comment::class, 'article_id');
}
}
