<!-- BEGIN MDCONTENT -->
@extends('layouts.app')

@section('content')
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
        <input name="userfile" type="file" id="userfile">
        <input name="upload" type="submit" value="upload">
    </form>
@endsection