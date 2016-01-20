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

{{--
<div id="Modal-flex-container-logout" class="Modal-flex-container-shown">
    <div id="Modal-row">
        <div class="Modal-flex-item">
            <form role="form" method="POST" action="{!! url('/login') !!}" value="{!! csrf_token() !!}">
                {!! csrf_field() !!}
                <div class="Container">
                    <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
                        <div class="Grid-cell">
                            <div class="InputAddOn">
                                <input type="email" class="InputAddOn-field" name="email"
                                       value="{!! old('email') !!}" placeholder="email">

                                @if ($errors->has('email'))
                                    {!! $errors->first('email') !!}
                                @endif
                            </div>
                            <div class="InputAddOn">
                                <input type="password" class="InputAddOn-field" name="password" placeholder="password">

                                @if ($errors->has('password'))
                                    {!! $errors->first('password') !!}
                                @endif
                            </div>
                            <div class="InputAddOn Modal-center">
                                <button class="Modal-Button Modal-Button--action Modal-Button--wide" type="submit">
                                    login
                                </button>
                                <!--div class="InputAddOn-item-checkbox">
                                    <input type="checkbox" class="InputAddOn-item-checkbox" name="remember">
                                </div-->
                            </div>
                            <!--div class="InputAddOn">
                        <a class="InputAddOn-item-link" href="{!! url('/password/reset') !!}">reset</a>
                    </div-->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    --}}
</body>

<!-- END LAYOUTS/APP -->
</html>
