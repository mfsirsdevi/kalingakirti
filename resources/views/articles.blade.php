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
                        <img class="img-responsive img-border img-full site-image" src="{{ asset('img/'.$article->image) }}" alt="">
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
        <div class="row">
        <div class="box">
            <form role="form" action="/article/{{ $article->id }}/comments" method="post">
            {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label>Name</label>
                        <input type="text" name="author" class="form-control">
                        @if ($errors->has('author'))
                        <span class="errors">
                            <strong>{{ $errors->first('author') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control">
                        @if ($errors->has('email'))
                        <span class="errors">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-12">
                        <label>Comment</label>
                        <textarea class="form-control" name="body" rows="6"></textarea>
                        @if ($errors->has('body'))
                        <span class="errors">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="form-group col-lg-12">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
            <ul class="comments box row">
                @foreach($article->comments as $comment)
                        <li class="box">
                        <i class="fa fa-user-circle pull-right fa-3x" aria-hidden="true"></i>
                        <h4>{{ $comment->author }}</h4>
                        <small><i class="fa fa-clock-o" aria-hidden="true"></i> Posted on {{ Carbon\Carbon::parse($comment->created_at)->format('d-m-Y') }}</small>
                        <p>{{ $comment->body }}</p>
                    </li>
                @endforeach
            </ul>
    </div>
    <!-- /.container -->
@endsection