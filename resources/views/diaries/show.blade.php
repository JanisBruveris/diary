<x-layout>
  <x-slot:title>
    {{ $diary->title }}
  </x-slot:title>

  <h1>{{ $diary->title }}</h1>

  <p><strong>Datums:</strong> {{ $diary->date }}</p>

  <p>{{ $diary->body }}</p>
  <a href="/diaries/{{ $diary->id }}/edit">Rediģēt</a>

  <form method="POST" action="/diaries/{{ $diary->id }}">
    @csrf
    @method('DELETE')

    <button type="submit">Dzēst</button>
  </form>
</x-layout>