@extends('layouts.app')

@section('title', 'Instrutores')

@section('content')
    <h2>Instrutores</h2>
    <p><a href="{{ route('instructors.create') }}">Novo instrutor</a></p>

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
            @forelse ($instructors as $instructor)
                <tr>
                    <td>{{ $instructor->name }}</td>
                    <td>{{ $instructor->email }}</td>
                    <td>{{ $instructor->phone ?? '-' }}</td>
                    <td>
                        <a href="{{ route('instructors.edit', $instructor) }}">Editar</a>
                        <form action="{{ route('instructors.destroy', $instructor) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Nenhum instrutor cadastrado.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
