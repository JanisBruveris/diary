<x-layout>
    <x-slot:title>Rediģēt bloga ierakstu</x-slot:title>

    <h1>Rediģēt bloga ierakstu</h1>

    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        @method('PUT')

        <label>
            Virsraksts:
            <input type="text" name="title" value="{{ old('title', $post->title) }}">
        </label>
        @error('title')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>
            Saturs:
            <textarea name="content">{{ old('content', $post->content) }}</textarea>
        </label>
        @error('content')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>
            Kategorija:
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </label>
        @error('category_id')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Saglabāt</button>
    </form>
</x-layout>
