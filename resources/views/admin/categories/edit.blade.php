@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Update Category!
    </div>
    <div class="panel-body">
        @include('admin.includes.errors')

        <form action="{{ route('category.update',['id'=>$category->id]) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name"></label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}">
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
