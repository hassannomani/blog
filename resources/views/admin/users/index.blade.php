@extends('layouts.app')

@section('content')
<div class="panel panel-default">
   Users
   <table class="table table-hover">
       <thead>
           <th>Image</th>
           <th>Name</th>
           <th>Permissions</th>
           <th>Delete</th>
       </thead>
       <tbody>
          @if($users->count() > 0)

            @foreach($users as $user)

              <tr>

                <td>

                  <img src="{{ asset($user->profile->avatar) }}" alt="" width="50px" height="50px" style="border-radius: 50%" />

                </td>

                <td>

                  {{ $user->name }}

                </td>

                <td>

                  @if($user->admin)
                    <a href="{{route('user.admin_change',['id'=>$user->id])}}" class="btn btn-danger">Delete admin</a>
                  @else
                    <a href="{{route('user.admin_change',['id'=>$user->id])}}" class="btn btn-success">Make admin</a>
                  @endif
                
                </td>

                <td>
                  @if(Auth::id() !== $user->id)
                    <a href="{{route('user.delete',['id' => $user->id ])}}" class="btn btn-danger">Delete</a>
                  @endif
                </td>

              </tr>

            @endforeach

          @else

            <tr>

              <td colspan="4" class="text-center">No Users</td>
            
            </tr>

          @endif
          
       </tbody>
       
   </table>
</div>
@endsection
