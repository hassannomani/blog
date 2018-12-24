@extends('layouts.app')

@section('content')
<div class="panel panel-default">
   Categories
   <table class="table table-hover">
       <thead>
           <th>Name</th>
           <th>Edit</th>
           <th>Delete</th>
       </thead>
       <tbody>
           @foreach($categories as $category)
           <tr>
               <td>{{ $category->name }}</td>
               <td><a href="/categories/edit/{{$category->id}}" class="btn btn-primary">Update</a></td>
               <td><a href="/categories/delete/{{$category->id}}" class="btn btn-danger">Delete</a></td>
           </tr>
           @endforeach
       </tbody>
       
   </table>
</div>
@endsection
