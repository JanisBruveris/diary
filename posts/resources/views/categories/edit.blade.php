<x-layout>
    <x-slot:title>Rediģēt kategoriju</x-slot:title>

    <h1>Rediģēt kategoriju</h1>

    <form method="POST" action="/categories/{{ $category->id }}">
        @csrf
        @method('PUT')

        <label>
            Nosaukums:
            <input type="text" name="name" value="{{ old('name', $category->name) }}">
        </label>
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Saglabāt</button>
    </form>
</x-layout>
