<x-app-layout :title="__('Page not found')">
<main id="main-content" class="mx-auto max-w-5xl px-6 py-16">
    <h1 class="text-4xl font-semibold tracking-tight">404 {{ __('Page not found') }}.</h1>
    <a href="{{ Statamic\Facades\Site::current()->url() }}" class="mt-6 inline-block underline underline-offset-4">{{ __('Return home') }}</a>
</main>
</x-app-layout>
