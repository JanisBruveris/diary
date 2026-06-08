<x-layout>
    <x-slot:title>Rediģēt dienasgrāmatas ierakstu</x-slot:title>

    <h1>Rediģēt dienasgrāmatas ierakstu</h1>

    <form method="POST" action="/diaries/{{ $diary->id }}">
        @csrf
        @method('PUT')

        <label>
            Virsraksts:
            <input
                type="text"
                name="title"
                value="{{ old('title', $diary->title) }}">
        </label>

        @error('title')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>
            Teksts:
            <textarea name="body">{{ old('body', $diary->body) }}</textarea>
        </label>

        @error('body')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>
            Datums:
            <input
                type="date"
                name="date"
                value="{{ old('date', $diary->date) }}">
        </label>

        @error('date')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Saglabāt</button>
    </form>
</x-layout>