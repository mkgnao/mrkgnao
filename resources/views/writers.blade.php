@extends('layouts.app')

@inject('writersService', 'App\Services\WritersServices')

@section('content')

{{ $writersService->getWriters() }}

@endsection
