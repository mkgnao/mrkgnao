@extends('layouts.app')

@section('content')
    <form role="form" method="POST" action="{{ url('/login') }}">
        {!! csrf_field() !!}

        <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">

            <div class="Grid-cell">
                <div class="InputAddOn">
                    <span class="InputAddOn-item">email</span>

                    <input type="email" class="InputAddOn-field" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        {{ $errors->first('email') }}
                    @endif
                </div>
            </div>

            <div class="Grid-cell">
                <div class="InputAddOn">
                    <span class="InputAddOn-item">password</span>
                    <input type="password" class="InputAddOn-field" name="password">

                    @if ($errors->has('password'))
                        {{ $errors->first('password') }}
                    @endif
                </div>
            </div>

            <div class="Grid-cell">
                <div class="InputAddOn">
                    remember
                    <input type="checkbox" class="InputAddOn-item" name="remember">
                </div>
            </div>

            <div class="Grid-cell">
                <div class="InputAddOn">
                    <button class="InputAddOn-item" type="submit">
                        submit
                    </button>
                </div>
            </div>

            <div class="Grid-cell">
                <div class="InputAddOn">
                    <a href="{{ url('/password/reset') }}">?</a>
                </div>
            </div>

        </div>
    </form>
@endsection
