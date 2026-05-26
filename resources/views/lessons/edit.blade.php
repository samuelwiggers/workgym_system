@extends('layouts.app')

@section('title', 'Editar aula')

@section('content')
    <h2>Editar aula</h2>

    <form action="{{ route('lessons.update', $lesson) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nome <input type="text" name="name" value="{{ old('name', $lesson->name) }}" required></label>
        <label>Instrutor
            <select name="instructor_id" required>
                @foreach ($instructors as $instructor)
                    <option value="{{ $instructor->id }}" @selected(old('instructor_id', $lesson->instructor_id) == $instructor->id)>{{ $instructor->name }}</option>
                @endforeach
            </select>
        </label>
        <label>Dia da semana <input type="text" name="weekday" value="{{ old('weekday', $lesson->weekday) }}" required></label>
        <label>Horário <input type="text" name="time" value="{{ old('time', $lesson->time) }}" required></label>
        <label>Vagas <input type="number" name="capacity" value="{{ old('capacity', $lesson->capacity) }}" required></label>
        <p><button type="submit">Atualizar</button> <a href="{{ route('lessons.index') }}">Voltar</a></p>
    </form>
@endsection
