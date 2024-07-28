<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\ArticleLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($id)
    {
        $article = Articles::find($id);
    
        if (!$article) {
        return response()->json(['error' => 'المقال غير موجود'], 404);
        }
    
        $existingLike = ArticleLike::where('user_id', Auth::id())
                                   ->where('article_id', $id)
                                   ->first();
         
    
        if (!$existingLike) {
            ArticleLike::create([
                'user_id' => Auth::id(),
                'article_id' => $id,
            ]);
    
            return response()->json(['message' => 'تم الإعجاب بالمقال'], 200);
        }
    
        return response()->json(['message' => 'المستخدم قد قام بالفعل بالإعجاب بالمقال'], 200);
    }
    
    public function unlike($id)
    {
        $existingLike = ArticleLike::where('user_id', Auth::id())
                                   ->where('article_id', $id)
                                   ->first();
        if ($existingLike) {
            $existingLike->delete();
            return response()->json(['message' => 'تم إلغاء الإعجاب بالمقال'], 200);
        }
        return response()->json(['message' => 'لم يعجب المستخدم بالمقال من قبل'], 200);
     }
    
      
  
    }

