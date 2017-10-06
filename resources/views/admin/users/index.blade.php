@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))
        <p class="alert alert-danger">{{ session('deleted_user') }}</p>
    @endif
    
    <h1>Users</h1>

    <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Function</th>
      </tr>
    </thead>
    <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td><button onclick="location.href='{{ route('users.edit', $user->id) }}'" class='btn btn-primary'>EDIT</button></td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
@stop