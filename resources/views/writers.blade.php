@extends('layouts.app')

@section('content')

@inject('writersService', 'App\Services\WritersService')

<div class="writersList">
    {!! $writersService->getWriters() !!}
</div>

@endsection