@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
       Edit post - {{ $post->title }}
    </div>
    <div class="panel-body">
        @include('admin.includes.errors')
        <form action="{{ route('post.update',['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title"></label>
                <input type="text" class="form-control" name="title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="featured"></label>
                <input type="file" class="form-control" name="featured">
            </div>
            <div class="form-group">
                <label for="category_id"></label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                        @if($category->id==$post->category_id)
                            selected="true"
                        @endif                        
                        >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Select Tags</label>
                @foreach($tags as $tag)

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="{{$tag->id}}" name="tags[]"
                            @foreach($post->tags as $t)
                                @if($tag->id==$t->id)
                                    checked
                                @endif
                            @endforeach
                            > {{$tag->tag}}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="content"></label>
                <textarea class="form-control" name="content" cols="5" rows="5" 
                >{{$post->content}}</textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
