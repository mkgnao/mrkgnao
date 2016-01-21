@extends('layouts.app')

@section('content')
    {{ dd($u) }}


    @if ($u == 'dk")
        <iframe src="https://calendar.google.com/calendar/embed?src=dk%40thecategory.com&ctz=Europe/Berlin"
                style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
    @elseif($u == "mk")

    @else

        <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=thecategory.com_n2d74avrpkj50mlk6qnmn34sok%40group.calendar.google.com&amp;color=%2323164E&amp;ctz=Europe%2FBerlin"
                style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>

    @endif

@endsection