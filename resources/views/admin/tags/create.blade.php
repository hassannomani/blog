@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Create a new Tag! <hr/>
    </div>
    <div class="panel-body">
        @include('admin.includes.errors')

        <form action="{{ route('tag.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="tag">Tag Name</label>
                <input type="text" class="form-control" name="tag" id="tag">
            </div>
           
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Store tag</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
