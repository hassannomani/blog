@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Create a New User! <hr/>
    </div>
    <div class="panel-body">
        @include('admin.includes.errors')

        <form action="{{ route('user.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
           
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Store User</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
