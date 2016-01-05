@extends('layouts.app')

@section('content')

    <div class="Container">

    @if ($tw != null)
        <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
            <div class="Grid-cell">

        @foreach(explode("\n", $tw) as $ltw)
            <div>
                {{{ $ltw }}}
            </div>
        @endforeach
            </div>
        </div>
    @endif
</div>

@endsection