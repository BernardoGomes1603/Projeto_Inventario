<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bem-vindo | Empresa W.</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: Figtree, sans-serif;
            margin: 0;
            background-color: #f0f4f8; /* Fundo claro */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }
        .container {
            text-align: left;
            max-width: 800px;
            padding: 3rem;
            background-color: #ffffff; /* Fundo branco para o conteúdo */
            border-radius: 8px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        .login-link {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 1rem;
            color: #ffffff;
            text-decoration: none;
            background-color: #4CAF50; /* Verde claro */
            padding: 12px 20px;
            border-radius: 50%;
            border: 2px solid #4CAF50;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
        }
        .login-link:hover {
            background-color: #388E3C; /* Verde escuro */
            color: #fff;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #0277BD; /* Azul claro */
        }
        h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #0277BD; /* Azul claro */
        }
        p {
            font-size: 1.125rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        .highlight {
            color: #4CAF50; /* Verde para destaque */
            font-weight: bold;
        }
        .footer {
            background-color: #0277BD; /* Azul escuro */
            color: #fff;
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
            border-radius: 0 0 8px 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('login') }}" class="login-link">Login</a>
        <h1>Bem-vindo à <span class="highlight">Empresa W.</span></h1>
        <h2>Sistema de Gerenciamento de Equipamentos e Itens</h2>
        <p>Estamos felizes em apresentar nosso sistema para o gerenciamento de <span class="highlight">equipamentos</span> e <span class="highlight">itens</span>, projetado para otimizar a gestão e o controle dos recursos da sua empresa.</p>
        <p>Com uma interface intuitiva e eficiente, você poderá facilmente monitorar, organizar e administrar seu inventário, acompanhando o status e a localização de todos os itens de forma prática e rápida.</p>
        <p>Explore as funcionalidades do sistema e aproveite ao máximo a gestão de seus recursos!</p>
    </div>
    <div class="footer">
        <p>© 2024 Empresa W. Todos os direitos reservados.</p>
    </div>
</body>
</html>
