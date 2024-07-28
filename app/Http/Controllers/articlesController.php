<?php

namespace App\Http\Controllers;
use App\Models\Articles;
use App\Models\User;
use App\Helpers\General;
use Illuminate\Http\Request;
use App\Http\Requests\ArticlesRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class articlesController extends Controller
{
    public function index()
    {     $articles = Articles::with('user')->whereHas('user')->paginate(PAGINATION_COUNT);
        
        return view('front.blog', compact('articles'));
    }
    public function create()
    {
        return view('articles.create');
    }
    
    public function store(ArticlesRequest $request)
    {
            if(!Auth::id())
        {
            return redirect()->route('articles')->with(['error' => 'You must log in to add an article']);

        }
        try {
            $filePath = "";
            if ($request->has('photo')) {
                $filePath = uploadImage('articles', $request->photo);
            }

            $articles = Articles::create([
                'content' => $request->content,
                'title' => $request->title,
                'categories' => $request->categories,
                'likes_count' => 0,
                'user_id' => $request= Auth::id(),
                'photo' => $filePath,
                
            ]);
            
            

            return redirect()->route('articles')->with(['success' => 'تم الحفظ بنجاح']);

        } catch (\Exception $ex) {
       return $ex;
            return redirect()->route('articles')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }
    
    
        public function edit($articles_id)
        {
            //get specific categories and its translations
            $articles = Articles::with('user')
                ->selection()
                ->find($articles_id);
    
            if (!$articles)
                return redirect()->route('articles')->with(['error' => 'هذا القسم غير موجود ']);
    
            return view('articles.edit', compact('articles'));
        }
    
    
        public function update($articles_id, ArticlesRequest $request)
        {
    
    
            try {
                $articles = Articles::find($articles_id);
    
                if (!$articles)
                    return redirect()->route('articles')->with(['error' => 'هذا القسم غير موجود ']);
    
                // update date
    
                Articles::where('id', $articles_id)
                    ->update([
                        'content' => $request->content,
                        'title' => $request->title,
                       'categories' => $request->categories,
                    
                    ]);
    
                // save image
    
                if ($request->has('photo')) {
                  $filePath = uploadImage ('articles', $request->photo);
                  Articles::where('id', $articles_id)
                        ->update([
                            'photo' => $filePath,
                        ]);
                }
    
    
                return redirect()->route('articles')->with(['success' => 'تم ألتحديث بنجاح']);
            } catch (\Exception $ex) {
    
                return redirect()->route('articles')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
            }
    
        }
    
    
        public function destroy($id)
        {
            try {
                $articles = Articles::find($id);
                if (!$articles)
                    return redirect()->route('articles')->with(['error' => 'هذا القسم غير موجود ']);
                    
    
                $image = Str::after($articles->photo, 'assets/');
                $image = base_path('assets/' . $image);
               // unlink($image); //delete from folder
                $articles->delete();
                return redirect()->route('articles')->with(['success' => 'تم حذف القسم بنجاح']);
    
            } catch (\Exception $ex) {
                return $ex;
                return redirect()->route('articles')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
            }
        }
    
      
      
}
