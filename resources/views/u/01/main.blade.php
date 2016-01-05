@extends('layouts.app')

@section('content')

{{ Auth::user()->id }}

{{ Auth::user()->name }}

@endsection
