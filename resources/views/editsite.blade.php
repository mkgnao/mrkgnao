<!-- BEGIN A/P/EDITSITE -->

@extends('layouts.app')

@section('content')

    {!! Form::model($mdContent, array('route' => array('md.update', 2), array('class' => 'MdContent'))) !!}

    {!! Form::text('md_content') !!}

    {!! Form::submit('submit') !!}

    {!! Form::close() !!}

    <script>

        function fillMdContent() {
            document.getElementById("mdContent").value = mkgnaoNs.mdContent;
        }

        mkgnaoNs.addLoadEvent(fillMdContent);

    </script>

@endsection
!-- END A/P/EDITSITE -->