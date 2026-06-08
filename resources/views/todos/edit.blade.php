<x-layout>
    <x-slot:title>Rediģēt uzdevumu</x-slot:title>

    <h1>Rediģēt uzdevumu</h1>

    <form method="POST" action="/todos/{{ $todo->id }}">
        @csrf
        @method('PUT')

        <label>
            Uzdevums:
            <input
                type="text"
                name="content"
                value="{{ old('content', $todo->content) }}">
        </label>

        @error('content')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>
            Izpildīts:
            <input type="hidden" name="completed" value="0">
            <input
                type="checkbox"
                name="completed"
                value="1"
                {{ old('completed', $todo->completed) ? 'checked' : '' }}>
        </label>

        @error('completed')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Saglabāt</button>
    </form>
</x-layout>