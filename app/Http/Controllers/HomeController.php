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
            'category' => 'required',
            'summary' => 'required',
            'content' => 'required',
        ]);

        $article = new Article;
        $article->title = $request->title;
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
