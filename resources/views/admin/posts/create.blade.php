@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Create a new post!
    </div>
    <div class="panel-body">
        @include('admin.includes.errors')
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
                <label for="category_id"></label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Select Tags</label>
                @foreach($tags as $tag)

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="{{$tag->id}}" name="tags[]"> {{$tag->tag}}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="content"></label>
                <textarea id="content" class="form-control" name="content" cols="5" rows="5" 
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

@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">   
@stop

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js" type="text/javascript" defer></script>
    <script>
        $(document).ready(function(){
            $("#content").summernote();
        });
    </script>
@stop 