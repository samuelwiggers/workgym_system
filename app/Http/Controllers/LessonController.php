<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::with('instructor')->orderBy('name')->get();

        return view('lessons.index', compact('lessons'));
    }

    public function create()
    {
        $instructors = Instructor::orderBy('name')->get();

        return view('lessons.create', compact('instructors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'instructor_id' => 'required|exists:instructors,id',
            'weekday' => 'required|string|max:50',
            'time' => 'required|string|max:50',
            'capacity' => 'required|integer|min:1',
        ]);

        Lesson::create($data);

        return redirect()->route('lessons.index')->with('success', 'Aula criada.');
    }

    public function edit(Lesson $lesson)
    {
        $instructors = Instructor::orderBy('name')->get();

        return view('lessons.edit', compact('lesson', 'instructors'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'instructor_id' => 'required|exists:instructors,id',
            'weekday' => 'required|string|max:50',
            'time' => 'required|string|max:50',
            'capacity' => 'required|integer|min:1',
        ]);

        $lesson->update($data);

        return redirect()->route('lessons.index')->with('success', 'Aula atualizada.');
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('lessons.index')->with('success', 'Aula excluída.');
    }
}
