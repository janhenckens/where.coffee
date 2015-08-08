@extends('base')

@section('content')
    {!! Form::open() !!}

    {!! Form::close() !!}

    {!! Form::open(['id' => 'query', 'url' => '/search']) !!}
        {!! Form::text('searchlocation', null, ['class' => 'form-control', 'placeholder' => 'search...']) !!}
        {!! Form::hidden('request_type', 'search') !!}
        {!! Form::submit('Go', ['class' => 'btn btn-primary', 'id' => 'query']) !!}
    {!! Form::close() !!}
@stop