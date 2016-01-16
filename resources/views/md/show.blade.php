<!-- BEGIN MD/SHOW -->

@extends('layouts.app')

@section('content')

    {!! Form::model($mdContent, array('route' => array('md.update', $mdContent->id)) !!}

            <div class="form-group">
                {!! Form::label('content', 'Content:') !!}
                {!! Form::text('content', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('submit', ['class' => 'form-control']) !!}
            </div>

    {!! Form::close() !!}
@stop
<!-- END MD/SHOW -->