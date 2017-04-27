@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="welcome-image">
            <article id="welcome-message" class="grad">
              <h2 class="text-center">Posuere suspendisse venenatis tempus dolor lacinia</h2>
              <p class="text-center">Velit est et urna mauris in mauris sed vitae vitae purus nulla varius risus ipsum et pulvinar erat egestas ac.</p>
              <div class="text-center">
                  <a class="btn btn-primary" href="#">Consectetur</a>
              </div>
            </article>
        </div>
    </div>
    <ul class="row">
        @foreach($articles as $article)
            <li class="col-xs-4">
                <p> {{ $article->summary }} </p>
                <div class="text-center">
                    <a class="btn btn-success" href="{{ url('article/'.$article->id) }}">Read More</a>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
