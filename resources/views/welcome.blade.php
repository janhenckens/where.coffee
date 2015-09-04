@extends('base')

@section('content')
    <div id='map'></div>
        <div class="container">
            <div class="panel">
                <img class="icon" src="../../img/icon.png" width="100px">
                <p>
                {!! Form::open(['id' => 'search-geo']) !!}
                    {!! Form::hidden('request_type', 'geo') !!}
                    {!! Form::submit('Get my location', ['class' => 'btn btn-lg btn-block', 'id' => 'getlocation']) !!}
                {!! Form::close() !!}
                </p>
                <p>
                {!! Form::open(['id' => 'search-location', 'class' => 'form-inline']) !!}
                    <div class="row">
                        <div class="col-md-8">
                            {!! Form::text('searchlocation', null, ['id' => 'city','class' => 'form-control input-lg', 'placeholder' => 'search...']) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Form::hidden('request_type', 'search') !!}
                            {!! Form::submit('Go', ['class' => 'btn btn-block btn-lg', 'id' => 'query']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
                </p>

                <p>
                    <a href="http://newsletter.onedge.be/h/i/9B066A5DDB877BA1"><button class="btn btn-lg btn-block">Newsletter</button></a>
                </p>
            </div>
    </div>
@stop