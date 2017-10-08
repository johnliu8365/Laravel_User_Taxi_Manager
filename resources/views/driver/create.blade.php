@extends('layouts.app')

@section('content')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAODJkpRQ8HqAPOpYANiYQWuowjO6s0IL8" type="text/javascript"></script>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Create Users</h1>

                {!! Form::open(['method'=>'POST', 'action'=>'DriversController@store']) !!}

                {!! Form::hidden('user_id', $user->id) !!}
                
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', $user->name, ['class'=>'form-control', 'disabled']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('license', 'License:') !!}
                    {!! Form::text('license', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('driverId', 'DriverId:') !!}
                    {!! Form::text('driverId', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="map">Map</label>
                    <div id="map" style="height:300px;"></div>
                </div>

                <div class="form-group">
                    {!! Form::label('latitude', 'Latitude:') !!}
                    {!! Form::text('latitude', null, ['class'=>'form-control', 'readonly'=>'readonly']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('longitude', 'Longitude:') !!}
                    {!! Form::text('longitude', null, ['class'=>'form-control', 'readonly'=>'readonly']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
                </div>
                
                {!! Form::close() !!}

                @include('includes.form_error')
            </div>
        </div>
    </div>

<script>
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: {lat: 25.047739, lng: 121.517040}
        });

        var marker = new google.maps.Marker({
            position: {lat: 25.047739, lng: 121.517040},
            map: map,
            draggable: true
        });

        google.maps.event.addListener(marker, 'position_changed', function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $('#latitude').val(lat);
            $('#longitude').val(lng); 
        });
</script>

@stop