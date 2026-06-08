<x-layout>
    <x-slot:title>{{ $post->title }}</x-slot:title>

    <article>
        <h1>{{ $post->title }}</h1>
        <p class="meta">Kategorija: {{ $post->category->name }}</p>
        <p>{!! nl2br(e($post->content)) !!}</p>
    </article>

    <div class="actions">
        <a class="button" href="/posts/{{ $post->id }}/edit">Rediģēt</a>

        <form class="inline-form" method="POST" action="/posts/{{ $post->id }}">
            @csrf
            @method('DELETE')
            <button class="delete-button" type="submit">Dzēst ierakstu</button>
        </form>
    </div>

    <hr>

    <h2>Komentāri</h2>

    @if ($post->comments->isEmpty())
        <p>Šim ierakstam vēl nav komentāru.</p>
    @endif

    @foreach ($post->comments as $comment)
        <div class="comment">
            <p><strong>{{ $comment->author }}</strong></p>
            <p>{{ $comment->content }}</p>

            <form class="inline-form" method="POST" action="/comments/{{ $comment->id }}">
                @csrf
                @method('DELETE')
                <button class="delete-button" type="submit">Dzēst komentāru</button>
            </form>
        </div>
    @endforeach

    <h3>Pievienot komentāru</h3>

    <form method="POST" action="/posts/{{ $post->id }}/comments">
        @csrf

        <label>
            Vārds:
            <input type="text" name="author" value="{{ old('author') }}">
        </label>
        @error('author')
            <p>{{ $message }}</p>
        @enderror

        <label>
            Komentārs:
            <textarea name="content">{{ old('content') }}</textarea>
        </label>
        @error('content')
            <p>{{ $message }}</p>
        @enderror

        <button type="submit">Pievienot komentāru</button>
    </form>
</x-layout>
