@extends('layouts.app')

@section('content')
<div class="panel panel-default">
   Tags
   <table class="table table-hover">
       <thead>
           <th>Name</th>
           <th>Edit</th>
           <th>Delete</th>
       </thead>
       <tbody>
        @if($tags->count() > 0)

          @foreach($tags as $tag)

            <tr>

              <td>{{ $tag->tag }}</td>

              <td>

                <a href="{{ route('tag.edit',['id'=>$tag->id]) }}" class="btn btn-primary">Update</a>
              
              </td>

              <td>

                <a href="{{ route('tag.delete',['id'=>$tag->id]) }}" class="btn btn-danger">Delete</a>
              
              </td>

            </tr>

          @endforeach

        @else

          <tr>

            <td class="text-center" colspan="3">

              No Tags

            </td>

          </tr>

        @endif

      </tbody>
       
   </table>
</div>
@endsection
