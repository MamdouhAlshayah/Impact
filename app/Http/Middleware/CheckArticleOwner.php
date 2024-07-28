<?php

namespace App\Http\Middleware;
use App\Models\Articles;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckArticleOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $article = Articles::find($request->route('id'));
        
        if ( !Auth::id()) {
            
        return redirect()->route('articles')->with('error', 'You must log in to add an article.');
          }
        
      

        return $next($request);
    }
}
