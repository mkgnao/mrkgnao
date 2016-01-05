@extends('layouts.app')

@section('content')

{{ Auth::user()->id }}

@endsection
