<!DOCTYPE html>
<!-- BEGIN LAYOUTS/APP -->
<!-- IN {{ $view_name }} -->
@if ($md_name)
<!-- IN MD_NAME {{ $md_name }} -->
@endif

<html lang="en" xmlns="http://www.w3.org/1999/html">

@include('partials.apphead')

<body id="bodyTop" class="HolyGrail">
@include('partials.mainbody')
</body>


<!-- END LAYOUTS/APP -->
</html>
