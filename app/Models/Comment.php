<?php

namespace App\Models;

use App\Models\Articles;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['article_id', 'user_id', 'content', 'created_at', 'updated_at'];

    public function article()
    {
        return $this->belongsTo(Articles::class, 'article_id');
    }
    

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
