<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/9823a17fbf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>last call to order your food</title>
</head>

<body>
    {{-- Header layout --}}
    <header>
        <div class="logo">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="LastCall logo">
            </a>

            <div class="about-us">
                <a class="navLink" href="/aboutUs">About us</a>
            </div>
        </div>

        <nav>
            <ul>
                @auth
                    <li>
                        <a  class="navLink" href="/orders/cart">Cart</a>
                    </li>
                    <li>
                        <span class="welcome">
                            Welcome {{ auth()->user()->firstname }}
                        </span>
                    </li>
                    <li>
                        <form method="POST" action="/logout">
                            @csrf
                            <button>Logout</button>
                        </form>
                    </li>
                @else
                    <li>
                        <a  class="navLink" href="/register">Register</a>
                    </li>
                    <li>
                        <a  class="navLink" href="/login">Login</a>
                    </li>
                @endauth
            </ul>
        </nav>
    </header>
    {{-- MAIN for every pages --}}
    <main>
        @yield('content')
    </main>

    <x-flash-message />
    {{-- FOOTER for every pages --}}
    <hr>
    <footer class="reveal animationUp">

        <div class="left-side">

            <ul>
                <li>
                    <a href=""><i class="fa-brands fa-instagram"></i> &nbsp; <span>Instagram</span></a>
                </li>
                <li>
                    <a href=""> <i class="fa-brands fa-facebook"></i>
                        &nbsp; <span>Facebook</span></a>
                </li>
                <li>
                    <a href=""><i class="fa-brands fa-linkedin"></i> &nbsp; <span>LinkedIn</span></a>
                </li>
            </ul>
        </div>
        <div class="footer">
            <div class="right-side">
                <ul>
                    <li>Our Commitment</li>
                    <li>Contact Us</li>
                    <li>Help and Support</li>
                    <li>lastcall@example.com</li>
                </ul>
            </div>
        </div>
    </footer>
    <div class="credentials">
        <p>LastCall 2023&copy;</p>
        <p>The website coded by 11111</p>
    </div>
    {{--to trigger the animation when it's only on your screen script --}}
    <script  src="{{ asset('js/animation.js') }}"></script>
</body>
</html>
