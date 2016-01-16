@extends('layouts.app')

@section('content')

@inject('writersService', 'App\Services\WritersService')

{{ $writersService->getWriters() }}

@endsection