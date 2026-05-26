@extends('layouts.app')

@section('title', 'Alunos')

@section('content')
    <h2>Alunos</h2>
    <p><a href="{{ route('students.create') }}">Novo aluno</a></p>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone ?? '-' }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student) }}">Editar</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Nenhum aluno cadastrado.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
