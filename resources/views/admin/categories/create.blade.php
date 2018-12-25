@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Create a new post!
    </div>
    <div class="panel-body">
        @include('admin.includes.errors')

        <form action="{{ route('category.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title"></label>
                <input type="text" class="form-control" name="name">
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
