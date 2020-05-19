<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function show ($articleid){
        $article = Article::find($articleid);

        return view('articles.show', ['article' => $article ]);
    }

    public function index() {
        return view('articles.all', ['articles' => Article::all()->sortByDesc('created_at')]);
    }


}
