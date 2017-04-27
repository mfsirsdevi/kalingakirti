<?php

namespace App\Http\Controllers;

use DB;
use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at','desc')->take(3)->get();
        return view('welcome', compact('articles'));
    }

    public function showFood()
    {
        $articles = DB::select('select * from articles where category = ?', ['Food']);

        return view('article', compact('articles'));
    }

    public function showPlaces()
    {
        $articles = DB::select('select * from articles where category = ?', ['Places']);

        return view('article', compact('articles'));
    }

    public function showCulture()
    {
        $articles = DB::select('select * from articles where category = ?', ['Culture']);

        return view('article', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('show', compact('article'));
    }
}
