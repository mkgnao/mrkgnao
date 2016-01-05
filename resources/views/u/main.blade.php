@extends('layouts.app')

@section('content')

    <div class="Container">

    @if ($tw != null)
        <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
            <div class="Grid-cell">

                <script type="text/javascript">
                    var langs = {{json_encode($tw)}};
                    console.log(langs);
                </script>

            </div>
        </div>
    @endif
</div>

@endsection