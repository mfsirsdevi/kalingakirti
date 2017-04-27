@extends('layouts.app')

@section('home')

    <a href="/admin">Home</a>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        <a href="create" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Create Article</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
            <!-- Current Tasks -->
            @if (isset($articles) && count($articles) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Recent Articles
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Created On</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr>
                                        <td class="table-text"><div>{{ $article->title }}</div></td>
                                        <td class="table-text"><div>{{ $article->category }}</div></td>
                                        <td class="table-text">
                                            <div>
                                                {{ Carbon\Carbon::parse($article->create_at)->format('d-m-Y') }}
                                            </div>
                                        </td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{ url('article/'.$article->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a class = "btn btn-primary" href="{{ url('admin/article/'.$article->id) }}"><i class="fa fa-btn fa-play" aria-hidden="true"></i> view</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            </div>
        </div>
    </div>
@endsection
