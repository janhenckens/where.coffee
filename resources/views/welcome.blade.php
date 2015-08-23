@extends('base')

@section('content')
    <div id='map'></div>
    <div id="form">
        <div class="container">
        {!! Form::open(['id' => 'getlocation']) !!}
        {!! Form::submit('Get my location', ['class' => 'btn btn-primary', 'id' => 'getlocation']) !!}
        {!! Form::close() !!}

        {!! Form::open(['id' => 'query']) !!}
            {!! Form::text('searchlocation', null, ['class' => 'form-control', 'placeholder' => 'search...']) !!}
            {!! Form::hidden('request_type', 'search') !!}
            {!! Form::submit('Go', ['class' => 'btn btn-primary', 'id' => 'query']) !!}
        {!! Form::close() !!}
        </div>
    </div>
@stop