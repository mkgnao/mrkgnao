@extends('layouts.app')

@section('content')

@inject('writersService', 'App\Services\WritersServices')

{{ $writersService->getWriters() }}

@endsection