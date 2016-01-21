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
                            <div class="center-tagline-content">
                                <div>Time for you and time for me,</div>
                            </div>
                            <div class="center-tagline-content">
                                <div>And time yet for a hundred indecisions,</div>
                            </div>
                            <div class="center-tagline-content">
                                <div>And for a hundred visions and revisions,</div>
                            </div>
                            <div class="center-tagline-content">
                                <div>Before the taking of a toast and tea.</div>
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