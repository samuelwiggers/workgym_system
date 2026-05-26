<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InstructorController extends Controller
{
    public function index()
    {
        $instructors = Instructor::orderBy('name')->get();

        return view('instructors.index', compact('instructors'));
    }

    public function create()
    {
        return view('instructors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors,email',
            'phone' => 'nullable|string|max:50',
        ]);

        Instructor::create($data);

        return redirect()->route('instructors.index')->with('success', 'Instrutor criado.');
    }

    public function edit(Instructor $instructor)
    {
        return view('instructors.edit', compact('instructor'));
    }

    public function update(Request $request, Instructor $instructor)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('instructors', 'email')->ignore($instructor->id)],
            'phone' => 'nullable|string|max:50',
        ]);

        $instructor->update($data);

        return redirect()->route('instructors.index')->with('success', 'Instrutor atualizado.');
    }

    public function destroy(Instructor $instructor)
    {
        $instructor->delete();

        return redirect()->route('instructors.index')->with('success', 'Instrutor excluído.');
    }
}
