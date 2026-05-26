@extends('layouts.app')

@section('title', 'Novo plano')

@section('content')
    <h2>Novo plano</h2>

    <form action="{{ route('plans.store') }}" method="POST">
        @csrf
        <label>Nome <input type="text" name="name" value="{{ old('name') }}" required></label>
        <label>Preço
            <input type="text" name="price" class="js-price-br" inputmode="decimal"
                value="{{ $priceDisplay }}" placeholder="0,00" required>
        </label>
        <label>Duração (meses) <input type="number" name="duration_months" value="{{ old('duration_months', 1) }}" required></label>
        <p><button type="submit">Salvar</button> <a href="{{ route('plans.index') }}">Voltar</a></p>
    </form>

    @include('plans._price_script')
@endsection
