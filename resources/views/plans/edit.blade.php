@extends('layouts.app')

@section('title', 'Editar plano')

@section('content')
    <h2>Editar plano</h2>

    <form action="{{ route('plans.update', $plan) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nome <input type="text" name="name" value="{{ old('name', $plan->name) }}" required></label>
        <label>Preço
            <input type="text" name="price" class="js-price-br" inputmode="decimal"
                value="{{ $priceDisplay }}" placeholder="0,00" required>
        </label>
        <label>Duração (meses) <input type="number" name="duration_months" value="{{ old('duration_months', $plan->duration_months) }}" required></label>
        <p><button type="submit">Atualizar</button> <a href="{{ route('plans.index') }}">Voltar</a></p>
    </form>

    @include('plans._price_script')
@endsection
