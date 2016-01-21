@extends('layouts.app')

@section('content')

    @inject('markdownService', 'App\Services\MarkdownService')

    <main class="HolyGrail-body opaque">
    <article class="HolyGrail-content" class="u-textCenter">
        <div class="Container">
            <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
                <div class="Grid-cell">
                    <div class="center-tagline-content">
                        <div>CONTACT THE CATEGORY</div>
                    </div>
                    <div class="center-contact">
                        To request a quote from the writing company contact:
                    </div>
                    <div class="center-contact">
                        writers@thecategory.com
                    </div>
                    <div class="center-contact">
                        For internships contact:
                    </div>
                    <div class="center-contact">
                        internships@thecategory.com
                    </div>
                    <div class="center-contact">
                        For any other inquiry contact:
                    </div>
                    <div class="center-contact">
                        etc@thecategory.com
                    </div>
                </div>
            </div>
        </div>
    </article>
</main>
    @endsection