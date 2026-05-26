@extends('layouts.app')

@section('title', 'Aulas')

@section('content')
    <h2>Aulas</h2>
    <p><a href="{{ route('lessons.create') }}">Nova aula</a></p>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Instrutor</th>
                <th>Dia</th>
                <th>Horário</th>
                <th>Vagas</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lessons as $lesson)
                <tr>
                    <td>{{ $lesson->name }}</td>
                    <td>{{ $lesson->instructor->name }}</td>
                    <td>{{ $lesson->weekday }}</td>
                    <td>{{ $lesson->time }}</td>
                    <td>{{ $lesson->capacity }}</td>
                    <td>
                        <a href="{{ route('lessons.edit', $lesson) }}">Editar</a>
                        <form action="{{ route('lessons.destroy', $lesson) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Nenhuma aula cadastrada.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
