<!-- BEGIN MD/EDIT -->

@extends('layouts.app')

@section('content')
    <div class="Container">
        <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">

            {!!Form::model($mdContent,array('method' => 'POST', 'route' => array('md/update', $mdContent->id))) !!}
            <input type="hidden" name="_method" value="PATCH">

            <div class="Grid-cell">
                <div class="InputAddOn">
                    {!! Form::text('content', null, ['class' => 'InputAddOn-field']) !!}
                </div>
            </div>

            <div class="Grid-cell">
                <div class="InputAddOn">
                    {!! Form::submit('submit', ['class' => 'InputAddOn-button-login']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
    @stop
            <!-- END MD/EDIT -->