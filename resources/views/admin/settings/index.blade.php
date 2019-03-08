@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
       Settings Page
    </div>
    <div class="panel-body">
        @include('admin.includes.errors')
        <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="site_name">Site Name</label>
                <input type="text" class="form-control" name="site_name" value="{{$setting->site_name}}">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" value="{{$setting->address}}">
            </div>
           <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" class="form-control" name="contact_number" value="{{$setting->contact_number}}">
            </div>
            <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="text" class="form-control" name="contact_email" value="{{$setting->contact_email}}">
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
