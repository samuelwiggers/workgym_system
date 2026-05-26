<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Plan;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with(['student', 'plan', 'lesson'])->latest()->get();

        return view('enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $students = Student::orderBy('name')->get();
        $plans = Plan::orderBy('name')->get();
        $lessons = Lesson::orderBy('name')->get();

        return view('enrollments.create', compact('students', 'plans', 'lessons'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'plan_id' => 'required|exists:plans,id',
            'lesson_id' => 'nullable|exists:lessons,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Enrollment::create($data);

        return redirect()->route('enrollments.index')->with('success', 'Matrícula criada.');
    }

    public function edit(Enrollment $enrollment)
    {
        $students = Student::orderBy('name')->get();
        $plans = Plan::orderBy('name')->get();
        $lessons = Lesson::orderBy('name')->get();

        return view('enrollments.edit', compact('enrollment', 'students', 'plans', 'lessons'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'plan_id' => 'required|exists:plans,id',
            'lesson_id' => 'nullable|exists:lessons,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $enrollment->update($data);

        return redirect()->route('enrollments.index')->with('success', 'Matrícula atualizada.');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()->route('enrollments.index')->with('success', 'Matrícula excluída.');
    }
}
