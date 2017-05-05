@extends('layouts.main')

@section('title', 'Articles')

@section('content')
<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">{{ Route::getFacadeRoot()->current()->uri() }}
                    </h2>
                    <hr>
                </div>

                @if(isset($articles))
                    @foreach($articles as $article)
                        <div class="col-lg-12 text-center">
                            <img class="img-responsive img-border img-full" src="{{ asset('img/'.$article->image) }}" alt="">
                            <h2>{{ $article->title }}
                                <br>
                                <small>{{ Carbon\Carbon::parse($article->created_at)->toFormattedDateString() }}</small>
                            </h2>
                            <div>
                                {!! $article->summary !!}
                            </div>
                            <a href="/article/{{ $article->id }}" class="btn btn-default btn-lg">Read More</a>
                            <hr>
                        </div>
                    @endforeach
                @endif
                <div class="col-lg-12 text-center">
                    <ul class="pager">
                        <li class="previous"><a href="#">&larr; Older</a>
                        </li>
                        <li class="next"><a href="#">Newer &rarr;</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
@endsection