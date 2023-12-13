<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/9823a17fbf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>last call to order your food</title>

    <?php
    if (auth()->check()) {
        $user= auth()->user();
        $user->profileImg ? ($userImg = asset('/storage/' . $user->profileImg)) : ($userImg = asset('/storage/profileImages/default.png'));
    }
    ?>
    
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
                @if (auth()->check())
                    @if ($user->role == 'admin')
                        <li>
                            <div id="dropdown">
                                <button class="navLink" id="dropbtn">Manage Clients</button>
                                <div class="dropdown-content">

                                    <a class="navLink" href="/business">Business</a>
                                    <a class="navLink" href="/users">User</a>
                                </div>
                            </div>
                        </li>
                    @endif
                    @if ($user->role == 'user' || $user->role == 'restaurantManager')
                        <li>
                            <a class="navLink" href="/orders/cart">Cart</a>
                        </li>
                    @endif
                    {{-- also the restaurant manager should see his orders as he can also buy from other restaurant --}}
                    @if ($user->role == 'user')
                        <li>
                            <a class="navLink" href="/myorders">My Orders</a>
                        </li>
                    @endif

                    @if ($user->role == 'restaurantManager')
                        <li>
                            <a class="navLink" href="/businessmanagerorders">Business Orders</a>
                        </li>
                    @endif
                    <li>
                        {{-- Styles are here just because I don't want mess up anything --}}
                        <a href="/users/{{$user->id }}">
                            <style>
                                #profileUserImg254 {
                                    width: 45px;
                                    height: 45px;
                                    background-image: url('{{ $userImg }}');
                                    background-size: cover;
                                    background-position: center;
                                    background-repeat: no-repeat;
                                    border-radius: 50%;
                                }
                            </style>
                            <div id="profileUserImg254">
                            </div>
                        </a>
                    </li>
                    <li>
                        <span class="welcome">
                            Welcome {{ $user->firstname }}
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
                        <a class="navLink" href="/register">Register</a>
                    </li>
                    <li>
                        <a class="navLink" href="/login">Login</a>
                    </li>
                @endif
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
    {{-- to trigger the animation when it's only on your screen script --}}
    <script src="{{ asset('js/animation.js') }}"></script>
    {{-- to trigger the animation when it's only on your screen script --}}
    <script src="{{ asset('js/animation.js') }}"></script>
</body>


</html>
