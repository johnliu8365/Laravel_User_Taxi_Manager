@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(Session::has('deleted_driver'))
                    <p class="alert alert-danger">{{ session('deleted_driver') }}</p>
                @endif
                
                <h1>Drivers
                <button onclick="location.href='{{ url('driver/api/getdata') }}'" class='btn btn-info btn-lg pull-right'>Output API</button>
                    @if(isset($user) && $user->role_id == 3)
                        <button onclick="location.href='{{ route('driver.create') }}'" class='btn btn-info btn-lg pull-right'>CREATE</button>
                    @endif
                </h1>
                
                <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>License</th>
                    <th>DriverId</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Function</th>
                </tr>
                </thead>
                <tbody>
                    @if($drivers)
                        @foreach($drivers as $driver)
                            <tr>
                                <td>{{$driver->user->name}}</td>
                                <td>{{$driver->license}}</td>
                                <td>{{$driver->driverId}}</td>
                                <td>{{$driver->latitude}}</td>
                                <td>{{$driver->longitude}}</td>
                                <td>{{$driver->created_at->diffForHumans()}}</td>
                                <td>{{$driver->updated_at->diffForHumans()}}</td>
                                <td>
                                    @if(isset($user) && $user->id == $driver->user_id)
                                        <button onclick="location.href='{{ route('driver.edit', $driver->id) }}'" class='btn btn-primary btn-sm'>EDIT</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                </table>
            </div>    
        </div>
    </div>
@endsection