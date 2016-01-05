@extends('layouts.app')

@section('content')

    {{ Auth::user()->name }}

    {{ Auth::user()->id }}

    {{ dd(get_defined_vars()) }}

@endsection
