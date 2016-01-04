@extends('layouts.app')

@section('content')
    <form role="form" method="POST" action="{{ url('/login') }}">
        {!! csrf_field() !!}

        <input type="email" name="email" value="{{ old('email') }}">

        @if ($errors->has('email'))
            {{ $errors->first('email') }}
        @endif

        <input type="password" class="form-control" name="password">

        @if ($errors->has('password'))
            {{ $errors->first('password') }}
        @endif

        <input type="checkbox" name="remember">


        <button type="submit">
        </button>

        <a href="{{ url('/password/reset') }}">?</a>
    </form>
@endsection
