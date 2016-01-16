<!DOCTYPE html>
<!-- BEGIN LAYOUTS/APP -->
<!-- IN VIEW {{ $view_name }} -->
@if ($md_name)
<!-- IN MD {{ $md_name }} -->
@endif

<html lang="en" xmlns="http://www.w3.org/1999/html">

@include('partials.apphead')

<body id="bodyTop" class="HolyGrail">
@include('partials.mainbody')
</body>


<!-- END LAYOUTS/APP -->
</html>
