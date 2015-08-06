@extends('base')

@section('content')
    <div id='map'>
        <div class="container">
            <div class="panel">
                <img class="icon" src="../assets/img/icon_white.png" width="100px">

                {!! Form::open() !!}

                {!! Form::close() !!}

                {!! Form::open() !!}
                    {!! Form::text('searchlocation', null, ['class' => 'form-control', 'placeholder' => 'search...']) !!}
                    <input id="searchsubmit" class="btn btn-secondary searchsubmit" type="submit" value="go">
                {!! Form::close() !!}
                <a href="http://newsletter.onedge.be/h/i/9B066A5DDB877BA1"><button class="btn newsletter">Newsletter</button></a>
            </div>
        </div>
    </div>
@stop