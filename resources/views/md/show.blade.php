<!-- BEGIN MD/SHOW -->

@extends('layouts.app')

@section('content')

{!! Form::model($mdContent, array('route' => array('md.update', $mdContent->md_name)) !!}

        <div class="form-group">
            {!! Form::label('md_content', 'Content:') !!}
            {!! Form::text('md_content', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('submit', ['class' => 'form-control']) !!}
        </div>

{!! Form::close() !!}

@endsection
        <!-- END MD/SHOW -->