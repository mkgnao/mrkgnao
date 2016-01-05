@extends('layouts.app')

@section('content')

    <div class="Container">

        <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
            <div class="Grid-cell">
                <div id="twcontent">
                    {{ dd(get_defined_vars()['__data']) }}
                </div>
            </div>
        </div>
</div>

@endsection