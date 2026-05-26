@extends('layouts.app')

@section('title', 'Editar matrícula')

@section('content')
    <h2>Editar matrícula</h2>

    <form action="{{ route('enrollments.update', $enrollment) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Aluno
            <select name="student_id" required>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" @selected(old('student_id', $enrollment->student_id) == $student->id)>{{ $student->name }}</option>
                @endforeach
            </select>
        </label>
        <label>Plano
            <select name="plan_id" required>
                @foreach ($plans as $plan)
                    <option value="{{ $plan->id }}" @selected(old('plan_id', $enrollment->plan_id) == $plan->id)>{{ $plan->name }}</option>
                @endforeach
            </select>
        </label>
        <label>Aula (opcional)
            <select name="lesson_id">
                <option value="">Nenhuma</option>
                @foreach ($lessons as $lesson)
                    <option value="{{ $lesson->id }}" @selected(old('lesson_id', $enrollment->lesson_id) == $lesson->id)>{{ $lesson->name }}</option>
                @endforeach
            </select>
        </label>
        <label>Data início <input type="date" name="start_date" value="{{ old('start_date', $enrollment->start_date?->format('Y-m-d')) }}" required></label>
        <label>Data fim <input type="date" name="end_date" value="{{ old('end_date', $enrollment->end_date?->format('Y-m-d')) }}"></label>
        <p><button type="submit">Atualizar</button> <a href="{{ route('enrollments.index') }}">Voltar</a></p>
    </form>
@endsection
