@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Update profile! <hr/>
    </div>
    <div class="panel-body">
        @include('admin.includes.errors')

        <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
            </div>

            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            </div>
           
            <div class="form-group">
                <label for="avatar">Upload new avatar</label>
                <input type="file" class="form-control" name="avatar" id="avatar">
            </div>

            <div class="form-group">
                <label for="facebook">Facebook Profile</label>
                <input type="text" class="form-control" name="facebook" id="facebook" value="{{$user->profile->facebook}}">
            </div>

            <div class="form-group">
                <label for="youtube">Youtube Profile</label>
                <input type="text" class="form-control" name="youtube" id="youtube" value="{{$user->profile->youtube}}">
            </div>

            <div class="form-group">
                <label for="about">About me</label>
                <textarea class="form-control" name="about" id="about" rows="6" cols="6"> {{$user->profile->about}}</textarea>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Update User</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
