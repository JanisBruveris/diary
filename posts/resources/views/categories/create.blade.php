<x-layout>
    <x-slot:title>Izveidot kategoriju</x-slot:title>

    <h1>Izveidot kategoriju</h1>

    <form method="POST" action="/categories">
        @csrf

        <label>
            Nosaukums:
            <input type="text" name="name" value="{{ old('name') }}">
        </label>
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Saglabāt</button>
    </form>
</x-layout>
