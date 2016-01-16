<!-- BEGIN MDCONTENT -->
@extends('layouts.app')

@section('content')

    @inject('markdownService', 'App\Services\MarkdownService')

    <div class="Container">
        <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
            <div class="Grid-cell">
                <div class="writersList">
                    {!! $markdownService->get($name) !!}
                </div>
            </div>
        </div>
    </div>

    @endsection
<!-- END MDCONTENT -->