<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#2563eb",
                    },
                },
            },
        };
    </script>
    <title>last call to order your food</title>
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
      
        <ul class="flex space-x-6 mr-6 text-lg">
          
            @auth
            <li>
                <span class="font-bold uppercase">
                    Welcome {{ auth()->user()->firstname }}
                </span>
            </li>
        
            <li>
                <form method="POST" action="/logout">
                    @csrf
                    <button>
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            </li>
            @else
            <li>
                <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i>
                    Register</a>
            </li>
            <li>
                <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a>
            </li>
        @endauth
        </ul>
    </nav>
    <main>
        @yield('content')
    </main>

    <x-flash-message />

</body>
</html>
