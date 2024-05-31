<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Comic Neue', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; /* Centramos horizontalmente */
            align-items: center; /* Centramos verticalmente */
            height: 100vh;
            background: url('/images/fondo.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .content-container {
            max-width: 600px;
            background-color: #333; /* Cambiamos el color de fondo a un tono más oscuro */
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            color: white; /* Cambiamos el color del texto a blanco */
        }

        .title {
            font-size: 4em;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .nav-links a {
            display: inline-block;
            margin: 10px;
            padding: 15px 30px; /* Aumentamos el tamaño de los botones */
            border: 1px solid transparent;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
            transition: background-color 0.3s, border-color 0.3s;
        }

        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-color: #4682B4; /* Cambiamos el color del borde a azul oscuro */
        }
    </style>
</head>

<body>
    <div class="content-container">
        <div class="content">
            <div class="title">
                Bienvenido Sistema de Gestión de Bienes COSEDE
            </div>
            @if (Route::has('login'))
            <div class="nav-links">
                @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                <a href="{{ route('login') }}">Iniciar Sesión</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}">Registar</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </div>
</body>

</html>
