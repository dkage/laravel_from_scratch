<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index() {

        if(request('tag')){
            $article = Tag::where('name', request('tag'))->firstOrFail()->articles;
        }else{
            $article = Article::all()->sortByDesc('created_at');
        }

        return view('articles.index', ['articles' => $article]);
    }


    public function show (Article $article){

        // For grabbing a deatailed view of a article, this works.
        // OBJECT $variable_name needs to be the same name as wildcard from route
        // public function show (Article $article){   is the same as this $article = Article::find($id);
        return view('articles.show', ['article' => $article ]);
    }

    public function create (){
        return view('articles.create', [
            'tags' => Tag::all(),
        ]);
    }

    public function store (){

        $this->validateArticle();

        $article = new Article(\request(['title', 'excerpt', 'body' ]));
        $article->user_id = 2; // auth()->id()
        $article->save();

        $article->tags()->attach(request('tags'));



        return redirect(route('articles.index'));
    }

    public function edit (Article $article){

        return view('articles.edit', ['article'=> $article]);
    }

    public function update (Article $article){
        $article->update($this->validateArticle());

        return redirect('/articles/' . $article->id);
    }

    /**
     * @return array
     */
    protected function validateArticle(): array
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tag,id'
        ]);
    }
}

