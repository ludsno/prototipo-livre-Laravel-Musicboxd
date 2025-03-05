<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicBoxd - @yield('title', 'Home')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="description" content="MusicBoxd - Sua plataforma para avaliar músicas e álbuns.">
    <meta name="keywords"
        content="música, álbuns, avaliações, resenhas,MusicBoxd, artistas, playlists, críticas, reviews, notas, comentários, música online">
    <meta name="author" content="HKLRW">
    <style>
        :root {
            --primary-color: #007BFF;
            --secondary-color: #1C1C1C;
            --text-color: #1C1C1C;
            --light-bg-color: #F8F9FA;
            --border-radius: 4px;
            --box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            --hover-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Helvetica, Arial, sans-serif;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: var(--secondary-color);
            color: white;
        }

        .logo {
            font-family: 'Consolas', 'Courier New', Courier, monospace;
            font-size: 28px;
            font-weight: bold;
            background: linear-gradient(90deg, var(--primary-color), #ff8c69);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .rating-stars {
            display: inline-flex;
            color: #FFD700;
        }

        .rating-stars .star {
            font-size: 18px;
        }

        .post {
            transition: box-shadow 0.3s, background-color 0.3s;
            border: 1px solid #e0e0e0;
            background-color: var(--light-bg-color);
        }

        .post:hover {
            box-shadow: var(--hover-shadow);
            background-color: #E9ECEF;
        }

        .edit-btn,
        .delete-btn {
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .edit-btn::before {
            content: '✎';
            font-size: 14px;
        }

        .delete-btn::before {
            content: '✖';
            font-size: 14px;
        }

        .search-bar input {
            color: var(--text-color);
            background-color: #ffffff;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: var(--secondary-color);
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        footer:hover {
            background-color: #333333;
        }

        main {
            padding-left: 0;
            padding-right: 0;
            padding-bottom: 60px;
        }

        .feed {
            width: 100%;
        }

        .post {
            width: 100%;
            max-width: none;
        }

        @media (max-width: 640px) {
            header {
                flex-direction: column;
                padding: 10px;
                gap: 10px;
            }

            .search-bar {
                width: 100%;
                display: flex;
                flex-direction: column;
                gap: 8px;
            }

            .search-bar input {
                width: 100%;
                max-width: none;
            }

            .search-bar button {
                width: 100%;
            }

            .user-options {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                gap: 8px;
            }

            main {
                padding-top: 10px;
                padding-bottom: 20px;
            }

            .feed {
                padding: 0 10px;
            }

            .post {
                flex-direction: column;
                align-items: flex-start;
                padding: 12px;
            }

            .post img {
                width: 48px;
                height: 48px;
                margin-bottom: 10px;
            }

            .post-content p {
                font-size: 16px;
            }

            .post-content .timestamp {
                font-size: 12px;
            }

            .form-container {
                padding: 12px;
            }

            .form-container select,
            .form-container input,
            .form-container textarea {
                padding: 8px;
            }

            footer {
                position: relative;
                margin-top: 20px;
            }
        }
    </style>
</head>

<body class="bg-gray-100">
    <header>
        <a href="{{ url('/') }}" class="logo"><strong>Music</strong>Boxd</a>
        <div class="search-bar">
            <form action="{{ route('search') }}" method="GET" class="flex gap-2">
                <input type="text" name="q" class="p-2 w-72 rounded-lg border border-gray-300"
                    placeholder="Pesquisar músicas, álbuns ou artistas...">
                <button type="submit"
                    class="p-2 bg-[var(--primary-color)] text-white rounded-lg hover:bg-[#e55b40] transition-all">Pesquisar</button>
            </form>
        </div>
        <div class="user-options flex gap-2 text-sm">
            Bem-vindo, {{ auth()->user()->name }} |
            <a href="{{ route('profile.show') }}"
                class="text-[var(--primary-color)] hover:text-[#e55b40] transition-colors">Meu Perfil</a> |
            <a href="{{ route('reviews.create') }}"
                class="text-[var(--primary-color)] hover:text-[#e55b40] transition-colors">Adicionar</a> |
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit"
                    class="text-[var(--primary-color)] hover:text-[#e55b40] transition-colors">Sair</button>
            </form>
        </div>
    </header>

    <main class="min-h-screen flex justify-center items-start pt-6 pb-16">
        <div class="w-full max-w-3xl">
            @yield('content')
        </div>
    </main>

    <footer>
        <p>© 2025 MusicBoxd - Feito por HKLRW</p>
    </footer>
</body>

</html>
