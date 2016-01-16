
<form id="{{ $mdName }}" mdName="{{ $mdName }}" role="form" method="POST" action="{{ url('/u/'.App\Util::idPad(Auth::id()).'/p/md/'.$mdName.'/store) }}" value="{{$mdName}}">
    {!! csrf_field() !!}

<div class="InputAddOn">
    <button class="InputAddOn-button-login" type="submit">
        update {{ $mdName }}
    </button>
</div>

<textarea id="textArea" name="textArea" form="{{ $mdName }}" rows="100" cols="100">

</textarea>

    <script>

        function fillTextArea() {
            document.getElementById("textArea").value = mdContent;
        }

        fillTextArea();
    </script>

</form>