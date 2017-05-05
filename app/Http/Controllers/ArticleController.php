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
        $article = DB::select('select * from articles where category = ?', ['Home']);
        return view('welcome', compact('article'));
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
        return view('articles', compact('article'));
    }
}
