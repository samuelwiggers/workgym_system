<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Academia')</title>
    <style>
        body { font-family: sans-serif; margin: 1.5rem; max-width: 960px; }
        nav a { margin-right: 1rem; }
        table { border-collapse: collapse; width: 100%; margin-top: 1rem; }
        th, td { border: 1px solid #ccc; padding: 0.5rem; text-align: left; }
        .success { background: #e6ffe6; padding: 0.5rem; margin-bottom: 1rem; }
        .errors { background: #ffe6e6; padding: 0.5rem; margin-bottom: 1rem; }
        form label { display: block; margin-top: 0.5rem; }
        form input, form select { margin-bottom: 0.5rem; width: 100%; max-width: 400px; }
    </style>
</head>
<body>
    <h1>Academia</h1>
    <nav>
        <a href="{{ route('students.index') }}">Alunos</a>
        <a href="{{ route('plans.index') }}">Planos</a>
        <a href="{{ route('instructors.index') }}">Instrutores</a>
        <a href="{{ route('lessons.index') }}">Aulas</a>
        <a href="{{ route('enrollments.index') }}">Matrículas</a>
    </nav>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
    @stack('scripts')
</body>
</html>
