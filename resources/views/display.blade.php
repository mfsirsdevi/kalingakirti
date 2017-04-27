@extends('layouts.app')

@section('content')

    <h1>The content page</h1>

    @foreach($articles as $article)

        <a href=""> {{ $article->title }} </a>

    @endforeach

@endsection