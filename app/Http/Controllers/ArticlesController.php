<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index() {
        return view('articles.index', ['articles' => Article::all()->sortByDesc('created_at')]);
    }


    public function show (Article $article){

        // For grabbing a deatailed view of a article, this works.
        // OBJECT $variable_name needs to be the same name as wildcard from route
        // public function show (Article $article){   is the same as this $article = Article::find($id);

        return view('articles.show', ['article' => $article ]);
    }

    public function create (){
        return view('articles.create');
    }

    public function store (){
        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $new_article = new Article();

        $new_article->title = \request('title');
        $new_article->excerpt = \request('excerpt');
        $new_article->body = \request('body');

        $new_article->save();

        return redirect('/articles/');
    }

    public function edit ($id) {
        $article = Article::find($id);

        return view('articles.edit', ['article'=> $article]);
    }

    public function update($id)
    {
        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $article = Article::find($id);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles/' . $article->id );
    }
}

