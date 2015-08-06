@extends('base')

@section('content')
    {!! Form::open() !!}

    {!! Form::close() !!}

    {!! Form::open(['url' => '/search']) !!}
        {!! Form::text('searchlocation', null, ['class' => 'form-control', 'placeholder' => 'search...']) !!}
        {!! Form::submit('Go', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@stop