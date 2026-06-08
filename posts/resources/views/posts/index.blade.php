<x-layout>
    <x-slot:title>Blogs</x-slot:title>

    <h1>Blogs</h1>

    <p><a class="button" href="/posts/create">Izveidot jaunu bloga ierakstu</a></p>

    @if ($posts->isEmpty())
        <article>Nav neviena bloga ieraksta. Sāc ar kategorijas un ieraksta izveidi.</article>
    @endif

    @foreach ($posts as $post)
        <article>
            <h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
            <p class="meta">Kategorija: {{ $post->category->name }}</p>
            <p>{{ Str::limit($post->content, 180) }}</p>
        </article>
    @endforeach
</x-layout>
