<!-- EDITSITE -->

@extends('layouts.app')

@section('content')

    @inject('markdownService', 'App\Services\MarkdownService')


    <script>
        var mdContent = '{!! $markdownService->get($md_name) !!}';
    </script>

    <textarea id="mdContentTextArea">

    </textarea>

    <script>
        function fillMdContentTextArea() {
            var mdContentTextArea = document.getElementById('mdContentTextArea');

            mdContentTextArea.value = mdContent;
        }

        mkgnaoNs.addLoadEvent(fillMdContentTextArea);
    </script>

    @endsection

!-- EDITSITE -->