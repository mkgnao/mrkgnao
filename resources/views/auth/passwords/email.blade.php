@extends('layouts.app')

        <!-- Main Content -->
@section('content')

    @if (session('status'))
        {{ session('status') }}
    @endif

    <form role="form" method="POST" action="{{ url('/password/email') }}">
        {!! csrf_field() !!}

        <input type="email" name="email" value="{{ old('email') }}">

        @if ($errors->has('email'))
            {{ $errors->first('email') }}
        @endif

        <button type="submit">
        </button>
    </form>

@endsection
