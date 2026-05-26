@extends('layouts.app')

@section('title', 'Matrículas')

@section('content')
    <h2>Matrículas</h2>
    <p><a href="{{ route('enrollments.create') }}">Nova matrícula</a></p>

    <table>
        <thead>
            <tr>
                <th>Aluno</th>
                <th>Plano</th>
                <th>Aula</th>
                <th>Início</th>
                <th>Fim</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($enrollments as $enrollment)
                <tr>
                    <td>{{ $enrollment->student->name }}</td>
                    <td>{{ $enrollment->plan->name }}</td>
                    <td>{{ $enrollment->lesson?->name ?? '-' }}</td>
                    <td>{{ $enrollment->start_date }}</td>
                    <td>{{ $enrollment->end_date ?? '-' }}</td>
                    <td>
                        <a href="{{ route('enrollments.edit', $enrollment) }}">Editar</a>
                        <form action="{{ route('enrollments.destroy', $enrollment) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Nenhuma matrícula cadastrada.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
