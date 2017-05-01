<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'asc')->get();
        return view('home', compact('articles'));
    }

    public function store(Request $request)
    {
        /**
         * validate the data before storing
         */
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png',
            'category' => 'required',
            'summary' => 'required',
            'content' => 'required'
        ]);

        $article = new Article;
        $article->title = $request->title;
        $file = $request->image;
        $file->move(public_path().'/img', $file->getClientOriginalName());
        $article->image = $file->getClientOriginalName();
        $article->category = $request->category;
        $article->summary = $request->summary;
        $article->content = $request->content;
        $article->save();
        return redirect('admin');
    }

    public function showArticles()
    {
        $articles = Article::orderBy('created_at', 'asc')->get();
        return view('display', compact('articles'));
    }

    public function showArticle(Article $article)
    {
        return view('show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('edit', compact('article'));
    }

    public function update(Request $request, $article)
    {
         $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'summary' => 'required',
            'content' => 'required'
        ]);

        Article::find($article)->update(['title' => $request->title]);
        return redirect()->route('home')
                        ->with('success','Article updated successfully');
    }

    public function createArticle()
    {
        return view('form');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return back();
    }
}
