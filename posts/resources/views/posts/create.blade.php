<x-layout>
    <x-slot:title>Izveidot bloga ierakstu</x-slot:title>

    <h1>Izveidot bloga ierakstu</h1>

    <form method="POST" action="/posts">
        @csrf

        <label>
            Virsraksts:
            <input type="text" name="title" value="{{ old('title') }}">
        </label>
        @error('title')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>
            Saturs:
            <textarea name="content">{{ old('content') }}</textarea>
        </label>
        @error('content')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>
            Kategorija:
            <select name="category_id">
                <option value="">-- Izvēlies kategoriju --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
