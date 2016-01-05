@extends('layouts.app')

@section('content')

    @if ($tw != null)
        <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">

        @foreach(explode("\n", $tw) as $ltw)
            <div class="Grid-cell">
                {{{ $ltw }}}
            </div>
        @endforeach

        </div>
    @endif

@endsection