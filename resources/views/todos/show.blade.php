<x-layout>
    <x-slot:title>
        {{ $todo->content }}
    </x-slot:title>

    <h1>{{ $todo->content }}</h1>

    <a href="/todos/{{ $todo->id }}/edit">Rediģēt</a>

    <form method="POST" action="/todos/{{ $todo->id }}">
        @csrf
        @method('DELETE')

        <button type="submit">Dzēst</button>
    </form>
</x-layout>