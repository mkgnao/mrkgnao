<!-- BEGIN MDCONTENT -->
@extends('layouts.app')

@section('content')
    <form method="post" enctype="multipart/form-data" name="{{$name}}" action="/upload/{{$name}}">
        <input type="hidden" name="MAX_FILE_SIZE" value="20000">
        <input name="{{$name}}" type="file" id="{{$name}}">
        <input name="upload" type="submit" value="upload">
    </form>
@endsection