@extends('layouts.app')

@section('content')

    {{ Auth::user()->name }}

    {{ Auth::user()->id }}

    <div id="tw_response">
    </div>

    <script>
        var tw = '{{ $tw }}';
        var tws = prettyPrint(tw);
        var e = document.getElementById('tw_response');
        var d = document.createElement('div');
        d.id = "tw_response_content";
        e.appendChild(d);
    </script>
@endsection