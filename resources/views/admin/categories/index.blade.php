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
        @if($categories->count() > 0)

          @foreach($categories as $category)

            <tr>

              <td>{{ $category->name }}</td>

              <td>

                <a href="{{ route('category.edit',['id'=>$category->id]) }}" class="btn btn-primary">Update</a>
              
              </td>

              <td>

                <a href="{{ route('category.delete',['id'=>$category->id]) }}" class="btn btn-danger">Delete</a>
              
              </td>

            </tr>

          @endforeach

        @else

          <tr>

            <td class="text-center" colspan="3">

              No categories

            </td>

          </tr>

        @endif

      </tbody>
       
   </table>
</div>
@endsection
