@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                @endif

                {!! Form::open(array('url' => 'home/submit', 'method' => 'POST')) !!}
                    <div class="form-group">
                        {!! Form::label('code', 'Code:') !!}
                        {!! Form::text('code', '', ['class' => 'form-control', 'placeholder' => 'Enter your code']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Submit',['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}

                    {{$usedcodeMessage}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
