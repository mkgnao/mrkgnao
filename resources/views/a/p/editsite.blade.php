<!-- BEGIN A/P/EDITSITE -->

@extends('layouts.app')

@section('content')

    @if (!empty($data['mdName']))

<form id="mdForm" mdName="{{ $mdName }}" role="form" method="POST" action="{{ url('/a/'.App\Util::idPad(Auth::id()).'/p/'.$mdName.')') }}" value="{!! csrf_field() !!}">
    {!! csrf_field() !!}

<div class="InputAddOn">
    <button class="InputAddOn-button-login" type="submit">
        update {{ $mdName }}
    </button>
</div>

<textarea id="mdContent" name="mdContent" form="mdForm" rows="100" cols="100">

</textarea>

    <script>

        function fillMdContent() {
            document.getElementById("mdContent").value = mkgnaoNs.mdContent;
        }

        mkgnaoNs.addLoadEvent(fillMdContent);

    </script>

</form>
    @else

        {{ dd('$mdName is empty') }}

    @endif

@endsection
!-- END A/P/EDITSITE -->