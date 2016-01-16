<!-- BEGIN U/P/MAIN -->
@extends('layouts.app')

@section('content')

    <div class="Container">
        <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
            <div class="Grid-cell">
                <div id="twcontent" class="twcontent">

                </div>
            </div>
        </div>
    </div>

    @include('partials.appscriptvars')

    <script>
        mkgnaoNs.addLoadEvent(mkgnaoNs.loadTw);
    </script>

    @endsection
            <!-- END U/P/MAIN -->