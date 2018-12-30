@extends('layouts.app')

@section('content')
<div class="panel panel-default">
   Posts
   <table class="table table-hover">
       <thead>
           <th>Image</th>
           <th>Title</th>
           <th>Edit</th>
           <th>Delete</th>
       </thead>
       <tbody>
           @foreach($posts as $post)
           <tr>
               <td><img url="{{ $post->featured }}" alt="{{ $post->slug }}" width="90px" height="50px" /></td>
               <td>{{ $post->title }}</td>
               <td><a href="{{ route('category.edit',['id'=>$post->id]) }}" class="btn btn-primary">Update</a></td>
               <td><a href="{{ route('category.delete',['id'=>$post->id]) }}" class="btn btn-danger">Delete</a></td>
           </tr>
           @endforeach
       </tbody>
       
   </table>
</div>
@endsection
