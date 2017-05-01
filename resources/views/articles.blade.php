@extends('layouts.main')

@section('title', 'Articles')

@section('content')
<div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">{{ $article->category }}
                    </h2>
                    <hr>
                </div>

                @if(isset($article))
                    <div class="col-lg-12 text-center">
                        <img class="img-responsive img-border img-full" src="{{ asset('img/'.$article->image) }}" alt="">
                        <h2>{{ $article->title }}
                            <br>
                            <small>{{ Carbon\Carbon::parse($article->created_at)->toFormattedDateString() }}</small>
                        </h2>
                        <div>
                            {!! $article->content !!}
                        </div>
                        <hr>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection