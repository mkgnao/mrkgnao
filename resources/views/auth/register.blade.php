@extends('layouts.app')

@section('content')
    <form role="form" method="POST" action="{{ url('/register') }}">
        {!! csrf_field() !!}

        <input type="text" name="name" value="{{ old('name') }}">

        @if ($errors->has('name'))
            {{ $errors->first('name') }}
        @endif

        <input type="email" name="email" value="{{ old('email') }}">

        @if ($errors->has('email'))

            {{ $errors->first('email') }}
        @endif

        <input type="password" name="password">

        @if ($errors->has('password'))
            {{ $errors->first('password') }}
        @endif

        <input type="password" name="password_confirmation">

        @if ($errors->has('password_confirmation'))
            {{ $errors->first('password_confirmation') }}
        @endif

        <button type="submit">
        </button>
    </form>
@endsection
