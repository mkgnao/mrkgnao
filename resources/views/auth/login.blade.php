@extends('layouts.app')

@section('content')
    <form id="login-form" role="form" method="POST" action="{{ url('/login') }}" value="{{ csrf_token() }}">
        {!! csrf_field() !!}

        <div class="Container">
            <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">

                <div-- class="Grid-cell">
                    <div class="InputAddOn">
                        <!--span class="InputAddOn-item">email</span-->

                        <input type="email" class="InputAddOn-field" name="email"
                               value="{{ old('email') }}" placeholder="email">

                        @if ($errors->has('email'))
                            {{ $errors->first('email') }}
                        @endif
                    </div>
                    <div class="InputAddOn">
                        <!--span class="InputAddOn-item">password</span-->
                        <input type="password" class="InputAddOn-field" name="password" placeholder="password">

                        @if ($errors->has('password'))
                            {{ $errors->first('password') }}
                        @endif
                    </div>
                    <!--div class="InputAddOn">
                        <span class="InputAddOn-item-checkbox">remember</span>
                        <div class="InputAddOn-item-checkbox">
                            <input type="checkbox" class="InputAddOn-item-checkbox" name="remember">
                        </div>
                    </div-->
                    <a id="form-submit" class="Header-button Button Button--action Button--wide">
                        <span class="Header-button-a">login</span>
                    </a>
                    <!--div class="InputAddOn">
                        <a class="InputAddOn-item-link" href="{{ url('/password/reset') }}">reset</a>
                    </div-->
                </div>
            </div>
        </div>
    </form>
    <script>
        var form = document.getElementById("login-form");
        document.getElementById("form-submit").addEventListener("click", function () {
            form.submit();
        });
    </script>
@endsection
