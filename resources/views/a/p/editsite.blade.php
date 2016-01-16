<!-- BEGIN A/P/EDITSITE -->

@extends('layouts.app')

@section('content')

    @if (!empty($data['md_name']))

<form id="form" md_name="{{ $md_name }}" role="form" method="GET" action="{{{ url('/a/'.App\Util::idPad(Auth::id()).'/p/'.$md_name) }}}" value="submit">

    <input type="hidden" name ="id" value="{{ Auth::id() }}">
    <input type="hidden" name ="mdName" value="{{ $md_name }}">

<div class="InputAddOn">
    <button class="InputAddOn-button-login" type="submit">
        update {{ $md_name }}
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

        {{ dd('md_name is empty') }}

    @endif

@endsection
!-- END A/P/EDITSITE -->