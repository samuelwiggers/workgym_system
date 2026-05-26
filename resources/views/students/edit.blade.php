@extends('layouts.app')

@section('title', 'Editar aluno')

@section('content')
    <h2>Editar aluno</h2>

    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nome <input type="text" name="name" value="{{ old('name', $student->name) }}" required></label>
        <label>E-mail <input type="email" name="email" value="{{ old('email', $student->email) }}" required></label>
        <label>Telefone <input type="text" name="phone" value="{{ old('phone', $student->phone) }}"></label>
        <p><button type="submit">Atualizar</button> <a href="{{ route('students.index') }}">Voltar</a></p>
    </form>
@endsection
