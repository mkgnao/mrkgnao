@extends('layouts.app')

@section('content')

@inject('writersService', 'App\Services\WritersService')

<div class="ellipsis">
    {!! $writersService->getWriters() !!}
</div>

@endsection