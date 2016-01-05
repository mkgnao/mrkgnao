@extends('layouts.app')

@section('content')

    {{ Auth::user()->name }}

    {{ Auth::user()->id }}

    {{{ $tw }}}
@endsection