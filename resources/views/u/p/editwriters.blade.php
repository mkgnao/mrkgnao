<form id="postwriters" role="form" method="POST" action="{{ url('/postwriters') }}" value="postwriters">
    {!! csrf_field() !!}

<div class="InputAddOn">
    <button class="InputAddOn-button-login" type="submit">
        update writers
    </button>
</div>

<textarea id="writersTextArea" name="writersTextArea" form="postwriters" rows="100" cols="100">

</textarea>

    <script>
        function fillTextArea() {
            document.getElementById("writersTextArea").value = writersText;
        }

        fillTextArea();
    </script>

</form>