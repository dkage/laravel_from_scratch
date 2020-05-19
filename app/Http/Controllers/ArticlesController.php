<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index() {
        return view('articles.index', ['articles' => Article::all()->sortByDesc('created_at')]);
    }


    public function show ($articleid){
        $article = Article::find($articleid);

        return view('articles.show', ['article' => $article ]);
    }

    public function create (){
        return view('articles.create');
    }

    public function store (){
        $new_article = new Article();

        $new_article->title = \request('title');
        $new_article->excerpt = \request('excerpt');
        $new_article->body = \request('body');

        $new_article->save();

        return view('articles.index');
    }

}
