<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


    public function show($id)
    { 
        $article = Articles::with('Comments')->find($id);
        
        if(!$article)
        return redirect()->route('articles')->with(['error' => 'Thies articles not found.']);
       
        return view('front.blog-details', compact('article'));
    }



    public function store($articles_id,Request $request)
    {
        try {
            
            if(!Auth::id())
        {
            return redirect()->route('blog-details',['id' => $articles_id])->with(['error' => 'You must log in to add an Comment.']);

        }
           
            $validatedData = $request->validate([
                'content' => 'required|string',
            ]);

            
            $Comment = Comment::create([
                'content' => $validatedData['content'],
                'user_id' => Auth::id(),
                'article_id' => $articles_id,
            ]);

           
            return redirect()->route('blog-details',['id' => $articles_id])->with(['success' => 'Comment added successfully.']);
        } catch (\Exception $ex) {
           
            return redirect()->route('blog-details',['id' => $articles_id])->with(['error' => 'An error occurred, please try again later']);
        }
    }
}