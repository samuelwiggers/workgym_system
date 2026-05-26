@extends('layouts.app')

@section('title', 'Planos')

@section('content')
    <h2>Planos</h2>
    <p><a href="{{ route('plans.create') }}">Novo plano</a></p>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Duração (meses)</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($plans as $plan)
                <tr>
                    <td>{{ $plan->name }}</td>
                    <td>R$ {{ number_format($plan->price, 2, ',', '.') }}</td>
                    <td>{{ $plan->duration_months }}</td>
                    <td>
                        <a href="{{ route('plans.edit', $plan) }}">Editar</a>
                        <form action="{{ route('plans.destroy', $plan) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Nenhum plano cadastrado.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
