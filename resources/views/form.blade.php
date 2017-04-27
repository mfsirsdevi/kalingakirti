@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="text-center">Add Your Article</h1>
        <hr>
        <form action="{{ url('/article') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Article Title -->
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Title</label>

                <div class="col-sm-9">
                    <input type="text" name="title" id="task-name" class="form-control">
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!-- Article Category -->
            <div class="form-group">
                <label for="category" class="col-sm-2 control-label">Category</label>

                <div class="col-sm-9">
                    <input type="text" name="category" id="task-name" class="form-control">
                    @if ($errors->has('category'))
                        <span class="help-block">
                            <strong>{{ $errors->first('category') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!-- Article Summary -->
            <div class="form-group">
                <label for="summmary" class="col-sm-2 control-label">Summary</label>

                <div class="col-sm-9">
                    <input name="summary" class="form-control">
                    @if ($errors->has('summary'))
                        <span class="help-block">
                            <strong>{{ $errors->first('summary') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!-- Article Content -->
            <div class="form-group">
                <label for="content" class="col-sm-2 control-label">Article</label>

                <div class="col-sm-9">
                    <textarea name="content" class="form-control" rows="10"></textarea>
                    @if ($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('footer')

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=bo7dlrqqjeij6mja7dzgq3v47zkfygw0eba0stowyjxr463w"></script>
    <script>tinymce.init({ selector:'textarea', menubar: false });</script>

@endsection