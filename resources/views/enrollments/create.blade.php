@extends('layouts.app')

@section('title', 'Nova matrícula')

@section('content')
    <h2>Nova matrícula</h2>

    <form action="{{ route('enrollments.store') }}" method="POST">
        @csrf
        <label>Aluno
            <select name="student_id" required>
                <option value="">Selecione</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" @selected(old('student_id') == $student->id)>{{ $student->name }}</option>
                @endforeach
            </select>
        </label>
        <label>Plano
            <select name="plan_id" required>
                <option value="">Selecione</option>
                @foreach ($plans as $plan)
                    <option value="{{ $plan->id }}" @selected(old('plan_id') == $plan->id)>{{ $plan->name }}</option>
                @endforeach
            </select>
        </label>
        <label>Aula (opcional)
            <select name="lesson_id">
                <option value="">Nenhuma</option>
                @foreach ($lessons as $lesson)
                    <option value="{{ $lesson->id }}" @selected(old('lesson_id') == $lesson->id)>{{ $lesson->name }}</option>
                @endforeach
            </select>
        </label>
        <label>Data início <input type="date" name="start_date" value="{{ old('start_date') }}" required></label>
        <label>Data fim <input type="date" name="end_date" value="{{ old('end_date') }}"></label>
        <p><button type="submit">Salvar</button> <a href="{{ route('enrollments.index') }}">Voltar</a></p>
    </form>
@endsection
