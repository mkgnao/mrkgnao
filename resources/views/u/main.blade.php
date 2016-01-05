@extends('layouts.app')

@section('content')

    <div class="Container">

    @if ($tw != null)
        <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
            <div class="Grid-cell">
                <div id="tw">

                </div>
            </div>
        </div>


            {{ $tw }}

    @endif
</div>

    <script type="text/javascript">

    </script>

@endsection