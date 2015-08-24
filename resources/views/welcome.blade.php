@extends('base')

@section('content')
    <div id='map'></div>
        <div class="container">
            <div class="panel">
                <img class="icon" src="../../img/icon.png" width="100px">
                {!! Form::open(['id' => 'getlocation']) !!}
                    {!! Form::submit('Get my location', ['class' => 'btn btn-primary', 'id' => 'getlocation']) !!}
                {!! Form::close() !!}

                {!! Form::open(['id' => 'query']) !!}
                <div class="row">
                    <div class="col-md-8">
                        {!! Form::text('searchlocation', null, ['class' => 'form-control', 'placeholder' => 'search...']) !!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::hidden('request_type', 'search') !!}
                        {!! Form::submit('Go', ['class' => 'btn btn-primary btn-lg btn-block', 'id' => 'query']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                <a href="http://newsletter.onedge.be/h/i/9B066A5DDB877BA1"><button class="btn btn-primary btn-lg btn-bloc">Newsletter</button></a>
            </div>
    </div>
@stop