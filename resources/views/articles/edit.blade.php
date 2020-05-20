@extends('layout')


@section('content')

    <h1>Edit article</h1>
    <form action="/articles/{{ $article->id }}" method="POST" style="font-size: 30px">
        @csrf
        @method('PUT')

        <br>
        <label>
            Title
            <input type="text" name="title" value="{{ $article->title }}">
        </label>
        <br>
        <label>
            Excerpt
            <input type="text" name="excerpt" value="{{ $article->excerpt }}">
        </label>
        <br>
        <label>
            Body
            <input type="text" name="body" value="{{ $article->body }}">
        </label>
        <br>
        <br>
        <button type="submit">Save new article</button>
    </form>

@endsection
