@extends('layout')


@section('content')

    <h1>Create new article</h1>
    <form action="/articles" method="POST" style="font-size: 30px">
        @csrf

        <br>
        <label>
            Title
            <input type="text" name="title">
        </label>
        <br>
        <label>
            Excerpt
            <input type="text" name="excerpt">
        </label>
        <br>
        <label>
            Body
            <input type="text" name="body">
        </label>
        <br>
        <br>
        <button type="submit">Save new article</button>
    </form>

@endsection
