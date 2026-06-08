<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;

class DiaryController extends Controller
{
  public function index()
  {
    $diaries = Diary::all();
    return view("diaries.index", compact("diaries"));
  }

  public function show(Diary $diary)
  {
    return view("diaries.show", compact("diary"));
  }

  public function create()
  {
    return view('diaries.create');
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'title' => 'required|max:255',
      'body' => 'required',
      'date' => 'required|date',
    ]);

    Diary::create($validated);

    return redirect('/diaries');
  }

  public function edit(Diary $diary)
  {
    return view('diaries.edit', compact('diary'));
  }

  public function update(Request $request, Diary $diary)
  {
    $validated = $request->validate([
      'title' => ['required', 'max:255'],
      'body' => ['required'],
      'date' => ['required', 'date'],
    ]);

    $diary->title = $validated['title'];
    $diary->body = $validated['body'];
    $diary->date = $validated['date'];

    $diary->save();

    return redirect('/diaries/' . $diary->id);
  }

  public function destroy(Diary $diary)
  {
    $diary->delete();
    return redirect('/diaries');
  }
}
