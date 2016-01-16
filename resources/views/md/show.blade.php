<!-- BEGIN MD/SHOW -->

@extends('layouts.app')

@section('content')

{!! Form::open() !!}

        <div class="form-group">

            {!! Form::label('md_content', 'Content:') !!}
            {!! Form::text('md_content', null, ['class' => 'form-control']) !!}

        </div>

{!! Form::close() !!}

@endsection
        <!-- END MD/SHOW -->