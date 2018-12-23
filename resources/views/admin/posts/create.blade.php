@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Create a new post!
    </div>
    <div class="panel-body">
        @if(count($errors) > 0)
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item text-danger">
                        {{ $error}}
                    </li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('post.create') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title"></label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="featured"></label>
                <input type="file" class="form-control" name="featured">
            </div>
            <div class="form-group">
                <label for="content"></label>
                <textarea class="form-control" name="content" cols="5" rows="5" 
                ></textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
