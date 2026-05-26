@extends('layouts.app')

@section('title', 'Editar instrutor')

@section('content')
    <h2>Editar instrutor</h2>

    <form action="{{ route('instructors.update', $instructor) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nome <input type="text" name="name" value="{{ old('name', $instructor->name) }}" required></label>
        <label>E-mail <input type="email" name="email" value="{{ old('email', $instructor->email) }}" required></label>
        <label>Telefone <input type="text" name="phone" value="{{ old('phone', $instructor->phone) }}"></label>
        <p><button type="submit">Atualizar</button> <a href="{{ route('instructors.index') }}">Voltar</a></p>
    </form>
@endsection
