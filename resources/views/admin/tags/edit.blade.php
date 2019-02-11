@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Edit Tag {{$tag->tag}}!  <hr/>
    </div>
    <div class="panel-body">
        @include('admin.includes.errors')

        <form action="{{ route('tag.update',['id'=>$tag->id]) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="tag">Tag Name</label>
                <input type="text" class="form-control" name="tag" id="tag" value="{{ $tag->tag}}">
            </div>
           
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Update tag</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
