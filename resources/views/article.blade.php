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
                            <img class="img-responsive img-border img-full" src="img/slide-1.jpg" alt="">
                            <h2>{{ $article->title }}
                                <br>
                                <small>{{ Carbon\Carbon::parse($article->created_at)->toFormattedDateString() }}</small>
                            </h2>
                            <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-default btn-lg">Read More</a>
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