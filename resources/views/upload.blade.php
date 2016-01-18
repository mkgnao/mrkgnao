<!-- BEGIN MDCONTENT -->
@extends('layouts.app')

@section('content')
    <form method="post" enctype="multipart/form-data" action="/upload/writers">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
        <input name="writersFile" type="file" id="writersFile">
        <input name="upload" type="submit" value="upload">
    </form>
@endsection