<x-layout>
    <x-slot:title>Izveidot dienasgrāmatas ierakstu</x-slot:title>

    <h1>Izveidot dienasgrāmatas ierakstu</h1>

    <form method="POST" action="/diaries">

        <input name="title" placeholder="Virsraksts" />

        <textarea name="body" placeholder="Teksts"></textarea>

        <input type="date" name="date" />

        <button>Saglabāt</button>
    </form>
</x-layout>