@extends('layout')


@section('content')

    <h1>Create new article</h1>
    <form action="/articles" method="POST" style="font-size: 30px">
        @csrf

        <br>
        <label>
            Title
            <input class="@error('title') bad-input @enderror" type="text" name="title" required value="{{ old('title') }}">
        </label>

        @if ($errors->has('title'))
            <p class="bad">{{ $errors->first('title') }} </p>
        @endif

        <br>
        <label>
            Excerpt
            <input class="@error('excerpt') bad-input @enderror" type="text" name="excerpt" required value="{{ old('excerpt') }}">
        </label>
        @if ($errors->has('excerpt'))
            <p class="bad">{{ $errors->first('excerpt') }} </p>
        @endif
        <br>
        <label>
            Body
            <input class="@error('body') bad-input @enderror" type="text" name="body"  value="{{ old('body') }}">
        </label>

        {{--   ERROR HANDLING  --}}
        @if ($errors->has('body'))
            <p class="bad">{{ $errors->first('body') }} </p>
        @endif
        {{--   ANOTHER EXAMPLE   --}}
        @error('body')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{--==========================================================================================--}}
        {{-- Select box for tags --}}
        <br>
        <label>
            Tags

            <select name="tags[]" id="tags" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>

        </label>

        {{--   ANOTHER EXAMPLE   --}}
        @error('tags')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        {{--==========================================================================================--}}



        <br>
        <br>
        <button type="submit">Save new article</button>
    </form>

@endsection
