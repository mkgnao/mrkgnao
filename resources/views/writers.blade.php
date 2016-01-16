<!-- BEGIN WRITERS -->
@extends('layouts.app')

@section('content')

@inject('writersService', 'App\Services\WritersService')

<div class="Container">
    <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
        <div class="Grid-cell">
            <div class="writersList">
                {!! $writersService->getWriters() !!}
            </div>
        </div>
    </div>
</div>

@endsection
<!-- END WRITERS -->