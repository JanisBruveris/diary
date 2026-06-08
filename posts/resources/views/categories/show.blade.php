<x-layout>
    <x-slot:title>{{ $category->name }}</x-slot:title>

    <article>
        <h1>{{ $category->name }}</h1>
        <p class="meta">Šīs kategorijas bloga ieraksti</p>
    </article>

    <div class="actions">
        <a class="button" href="/categories/{{ $category->id }}/edit">Rediģēt kategoriju</a>

        <form class="inline-form" method="POST" action="/categories/{{ $category->id }}">
            @csrf
            @method('DELETE')
            <button class="delete-button" type="submit">Dzēst kategoriju</button>
        </form>
    </div>

    @if ($category->posts->isEmpty())
        <p>Šajā kategorijā vēl nav ierakstu.</p>
    @endif

    @foreach ($category->posts as $post)
        <article>
            <h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
            <p>{{ Str::limit($post->content, 160) }}</p>
        </article>
    @endforeach
</x-layout>
