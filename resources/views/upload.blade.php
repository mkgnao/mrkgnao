<!-- BEGIN MDCONTENT -->
@extends('layouts.app')

@section('content')
    <form method="post" enctype="multipart/form-data" id="{{$name}}" name="{{$name}}" action="/upload/{{$name}}">
        <input type="hidden" name="MAX_FILE_SIZE" value="20000">
        <input name="{{$name}}" type="file" id="{{$name}}">
        <input name="{{$name}}" type="submit" value="{{$name}}">
    </form>
@endsection