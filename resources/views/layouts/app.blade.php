<!DOCTYPE html>
<!-- BEGIN LAYOUTS/APP -->
<!-- IN VIEW {!! $view_name !!} -->
@if (!empty($data['md_name']))
        <!-- IN MD {!! $md_name !!} -->
@endif

<html lang="en">

@include('partials.apphead')

<body id="bodyTop" class="HolyGrail">
@include('partials.mainbody')
</body>


<!-- END LAYOUTS/APP -->
</html>
