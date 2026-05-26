@extends('layouts.app')

@section('title', 'Novo aluno')

@section('content')
    <h2>Novo aluno</h2>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <label>Nome <input type="text" name="name" value="{{ old('name') }}" required></label>
        <label>E-mail <input type="email" name="email" value="{{ old('email') }}" required></label>
        <label>Telefone <input type="text" name="phone" value="{{ old('phone') }}"></label>
        <p><button type="submit">Salvar</button> <a href="{{ route('students.index') }}">Voltar</a></p>
    </form>
@endsection
