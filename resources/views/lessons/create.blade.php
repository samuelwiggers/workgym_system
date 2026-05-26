@extends('layouts.app')

@section('title', 'Nova aula')

@section('content')
    <h2>Nova aula</h2>

    <form action="{{ route('lessons.store') }}" method="POST">
        @csrf
        <label>Nome <input type="text" name="name" value="{{ old('name') }}" required></label>
        <label>Instrutor
            <select name="instructor_id" required>
                <option value="">Selecione</option>
                @foreach ($instructors as $instructor)
                    <option value="{{ $instructor->id }}" @selected(old('instructor_id') == $instructor->id)>{{ $instructor->name }}</option>
                @endforeach
            </select>
        </label>
        <label>Dia da semana <input type="text" name="weekday" value="{{ old('weekday') }}" placeholder="Segunda" required></label>
        <label>Horário <input type="text" name="time" value="{{ old('time') }}" placeholder="08:00" required></label>
        <label>Vagas <input type="number" name="capacity" value="{{ old('capacity', 20) }}" required></label>
        <p><button type="submit">Salvar</button> <a href="{{ route('lessons.index') }}">Voltar</a></p>
    </form>
@endsection
