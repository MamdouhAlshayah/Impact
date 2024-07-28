<?php

namespace App\Models;
use App\Models\Articles;
    
use Illuminate\Database\Eloquent\Model;

class ArticleLike extends Model
{
    protected $table = 'article_likes';
    protected $fillable = ['user_id', 'article_id'];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function article()
    {
        return $this->belongsTo(Article::class,'article_id');
    }
}
