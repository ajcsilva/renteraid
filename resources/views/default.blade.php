<x-app-layout :title="isset($title) ? (string) $title : null">
    <main id="main-content">
        @include('sections.hero')
        @include('sections.how-it-works')
        @include('sections.about')
        @include('sections.faqs')
        <div class="content mx-auto max-w-5xl px-6 py-16">
            {!! $content ?? '' !!}
        </div>
    </main>
</x-app-layout>
