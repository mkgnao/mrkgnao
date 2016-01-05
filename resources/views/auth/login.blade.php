@extends('layouts.app')

@section('content')
    <form role="form" method="POST" action="{{ url('/login') }}">
        {!! csrf_field() !!}
        <div>
            email
            <input type="email" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                {{ $errors->first('email') }}
            @endif

        </div>

        <div>
            password
            <input type="password" name="password">

            @if ($errors->has('password'))
                {{ $errors->first('password') }}
            @endif

        </div>

        <div>
            remember
            <input type="checkbox" name="remember">
        </div>

        <div>
            <button type="submit">
                submit
            </button>

        </div>

        <div>
            <a href="{{ url('/password/reset') }}">?</a>
        </div>

    </form>
@endsection
