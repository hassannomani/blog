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
          @if($posts->count() > 0)

            @foreach($posts as $post)

              <tr>

                <td>

                  <img src="{{ $post->featured }}" alt="{{ $post->slug }}" width="90px" height="50px" />

                </td>

                <td>

                  {{ $post->title }}

                </td>

                <td>

                  <a href="{{ route('post.edit',['id'=>$post->id]) }}" class="btn btn-primary">Update</a>

                </td>

                <td>

                  <a href="{{ route('post.delete',['id'=>$post->id]) }}" class="btn btn-danger">Delete</a>

                </td>

              </tr>

            @endforeach

          @else

            <tr>

              <td colspan="4" class="text-center">No posts published</td>
            
            </tr>

          @endif
          
       </tbody>
       
   </table>
</div>
@endsection
