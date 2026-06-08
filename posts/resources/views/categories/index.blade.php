<x-layout>
    <x-slot:title>Kategorijas</x-slot:title>

    <h1>Kategorijas</h1>

    <p><a class="button" href="/categories/create">Izveidot kategoriju</a></p>

    @if ($categories->isEmpty())
        <article>Nav nevienas kategorijas.</article>
    @endif

    @foreach ($categories as $category)
        <article>
            <h2><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></h2>
            <p class="meta">Ieraksti: {{ $category->posts_count }}</p>
        </article>
    @endforeach
</x-layout>
