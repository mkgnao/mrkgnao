@extends('layouts.app')

@section('content')
    <form role="form" method="POST" action="{!! url('/password/reset') !!}">
        {!! csrf_field() !!}

        <input type="hidden" name="token" value="{!! $token !!}">

        <input type="email" name="email" value="{!! $email or old('email') !!}">

        @if ($errors->has('email'))
            {!! $errors->first('email') !!}
        @endif

        <input type="password" name="password">

        @if ($errors->has('password'))
            {!! $errors->first('password') !!}
        @endif

        <input type="password" name="password_confirmation">

        @if ($errors->has('password_confirmation'))
            {!! $errors->first('password_confirmation') !!}
        @endif

        <button type="submit">

        </button>
    </form>

@endsection
