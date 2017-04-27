@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="text-capitalize panel-heading">
                    {{ Route::getFacadeRoot()->current()->uri() }}
                </div>

                <div class="panel-body">
                    @if(isset($articles))
                        @foreach($articles as $article)
                            <div>
                                <a href="{{ url('article/'.$article->id) }}">
                                    {{ $article->title }}
                                </a>
                                <hr>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection