@extends('layouts.app')

@section('content')
<div class="panel panel-default">
   Trash
   <table class="table table-hover">
       <thead>
           <th>Image</th>
           <th>Title</th>
           <th>Restore</th>
           <th>Destroy</th>
       </thead>
       <tbody>
          @if($posts->count() > 0)

            @foreach($posts as $post)

              <tr>
                <td><img src="{{ $post->featured }}" alt="{{ $post->slug }}" width="90px" height="50px" /></td>

                <td>{{ $post->title }}</td>

                <td>
                  <a href="{{ route('post.restore',['id'=>$post->id]) }}" class="btn btn-primary">Restore</a>
                </td>

                <td>
                  <a href="{{ route('post.parDelete',['id'=>$post->id]) }}" class="btn btn-danger">Destroy</a>
                </td>

              </tr>

            @endforeach

          @else

            <tr>

              <td colspan="4" class="text-center">

                No trashed posts

              </td>

            </tr>

          @endif

       </tbody>
       
   </table>
</div>
@endsection
