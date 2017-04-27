@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ $article->title }}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">admin</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{ Carbon\Carbon::parse($article->create_at)->format('d-m-Y') }}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">

                <hr>

                <!-- Post Content -->
                <div>
                    {!! $article->content !!}
                </div>

                <hr>

                @if(Auth::guest())
                    <!-- Blog Comments -->

                    <!-- Comments Form -->
                    <div class="well">
                        <h4>Leave a Comment:</h4>
                        <form role="form" action="/article/{{ $article->id }}/comments" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="author" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Comment</label>
                                <textarea class="form-control" name="body" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                    <hr>

                    <ul>
                        @foreach($article->comments as $comment)
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            <h4>{{ $comment->author }}</h4>
                            <p>{{ $comment->body }}</p>
                        @endforeach
                    </ul>
                @endif

@endsection