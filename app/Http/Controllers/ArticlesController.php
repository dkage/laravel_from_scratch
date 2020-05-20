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
        Article::create($this->validateArticle());

        return redirect('/articles/');
    }

    public function edit (Article $article){

        return view('articles.edit', ['article'=> $article]);
    }

    public function update (Article $article){
        $article->update($this->validateArticle());

        return redirect('/articles/' . $article->id );
    }

    /**
     * @return array
     */
    protected function validateArticle(): array
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
}

