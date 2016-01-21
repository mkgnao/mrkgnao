<!-- BEGIN INDEX -->
@extends('layouts.app')

@section('content')

    @inject('markdownService', 'App\Services\MarkdownService')

    <main class="HolyGrail-body opaque scrollable">
        <article class="HolyGrail-content" class="u-textCenter">
            <div class="Container">
                <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
                    <div class="Grid-cell">
                        <!-- should be in motherfucking md file -->
                        <div class="center-title">THE CATEGORY</div>
                        <div id="center-tagline" class="center-tagline">
                            <div class="center-tagline-content">
                                <div>The writing company.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <nav class="HolyGrail-nav u-textCenter">
        </nav>
        <aside class="HolyGrail-ads u-textCenter">
        </aside>
    </main>
    @endsection
            <!-- BEGIN INDEX -->