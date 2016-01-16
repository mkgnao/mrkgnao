<!-- BEGIN EDITSITE -->
@extends('layouts.app')

@section('content')

    @inject('markdownService', 'App\Services\MarkdownService')

    <form role="form" method="POST" action="{{ url('/updatewriters') }}" value="updatewriters">

    </form>
    <script>
        var mdContent = '{{ $markdownService->getRaw($md_name) }}';
    </script>

    <div class="InputAddOn">
        <button class="InputAddOn-button-login" type="submit">
            login
        </button>
    </div>

    <textarea id="mdContentTextArea" class="mdContentTextArea" name="mdContent">

    </textarea>


    </form>

    <script>
        function fillMdContentTextArea() {
            var mdContentTextArea = document.getElementById('mdContentTextArea');

            mdContentTextArea.value = mdContent;
        }

        mkgnaoNs.addLoadEvent(fillMdContentTextArea);
    </script>

    @endsection

!-- ENDEDITSITE -->