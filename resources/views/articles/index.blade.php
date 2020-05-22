@extends ('layout')


@section('content')
    <div id="wrapper">
        <div id="page" class="container">
                <ul class="style1">
{{--                    @foreach ($articles as $article)--}}
{{--                        <li class="first">--}}
{{--                            <a href="articles/{{ $article->id }}"><h3 >{{ $article->title }}</h3></a>--}}
{{--                            <p><a href="#">{{ $article->excerpt }}</a></p>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}

                    @forelse($articles as $article)
                        <li class="first">
                            <a href="articles/{{ $article->id }}"><h3 >{{ $article->title }}</h3></a>
                            <p><a href="#">{{ $article->excerpt }}</a></p>
                        </li>
                        @empty
                           <li>
                               <p>No related articles yet for this tag.</p>
                           </li>

                    @endforelse

                </ul>
        </div>
    </div>
    <div id="copyright" class="container">
        <p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
    </div>
@endsection
