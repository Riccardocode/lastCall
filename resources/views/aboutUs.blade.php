<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/aboutUsPage.css') }}">
    <script src="https://kit.fontawesome.com/9823a17fbf.js" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body class="aboutUsBody">

    <header>
        <div>
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="LastCall logo" class="logo">
            </a>
        </div>
    </header>

    <h1>Meet Our Team</h1>

    {{-- The main container with all the cards --}}

    <div class="imgSection">
        {{-- The individial card, consisting of the image and text --}}
        {{-- Riccardo card --}}
        <div class="heroSection card">
            <div class="imgAbout card__side card__side--front">
                <img src="{{ asset('images/Riccardo.png') }}" class="heroImage" />
            </div>

            <div class="aboutInfo card__side card__side--back">
                <div class="card__cta">
                    <h2>Riccardo Scalia</h2>
                    <p>
                        Fullstack Developer and <br> Project Manager
                    </p>
                    {{-- Social Media Links --}}
                    <div class="socialMediaLinks">
                        <ul>
                            <li>
                                <a href="https://www.linkedin.com/in/riccardosc/"><i class="fa-brands fa-linkedin"></i>
                                    &nbsp;
                                    <span>LinkedIn</span></a>
                            </li>

                            <li>
                                <a href="https://github.com/Riccardocode"><i class="fa-brands fa-github"></i> &nbsp;
                                    <span>GitHub</span></a>
                            </li>

                            <li>
                                <a href="scaliariccardo_89@hotmail.it"><i class="fa-solid fa-envelope"></i> &nbsp;
                                    <span>Email</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        {{-- Luiza Card --}}
        {{-- The individial card, consisting of the image and text --}}
        <div class="heroSection card">
            <div class="imgAbout card__side card__side--front">
                <img src="{{ asset('images/Luiza.png') }}" class="heroImage" />
            </div>

            <div class="aboutInfo card__side card__side--back">
                <div class="card__cta">
                    <h2>Luiza Moshkin</h2>
                    <p>
                        Fullstack Developer and <br> UX / UI Designer
                    </p>
                    {{-- Social Media Links --}}
                    <div class="socialMediaLinks">
                        <ul>
                            <li>
                                <a href="https://www.linkedin.com/in/luiza-moshkin/"><i
                                        class="fa-brands fa-linkedin"></i> &nbsp;
                                    <span>LinkedIn</span></a>
                            </li>

                            <li>
                                <a href="https://github.com/la-viza"><i class="fa-brands fa-github"></i> &nbsp;
                                    <span>GitHub</span></a>
                            </li>

                            <li>
                                <a href="luiza.moshkin@gmail.com"><i class="fa-solid fa-envelope"></i> &nbsp;
                                    <span>Email</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Brandon Card --}}
        {{-- The individial card, consisting of the image and text --}}
        <div class="heroSection card">
            <div class="imgAbout card__side card__side--front">
                <img src="{{ asset('images/Brandon.png') }}" class="heroImage" />
            </div>

            <div class="aboutInfo card__side card__side--back">
                <div class="card__cta">
                    <h2>Brandon Steffan</h2>
                    <p>
                        Fullstack Developer and <br> Api Architect
                    </p>
                    {{-- Social Media Links --}}
                    <div class="socialMediaLinks">
                        <ul>
                            <li>
                                <a href="https://www.linkedin.com/in/brandon-steffan/"><i
                                        class="fa-brands fa-linkedin"></i> &nbsp;
                                    <span>LinkedIn</span></a>
                            </li>

                            <li>
                                <a href="https://github.com/BrandonSteffan"><i class="fa-brands fa-github"></i> &nbsp;
                                    <span>GitHub</span></a>
                            </li>

                            <li>
                                <a href="brandon.steffan15@gmail.com"><i class="fa-solid fa-envelope"></i> &nbsp;
                                    <span>Email</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>





        {{-- Antoine Card --}}
        {{-- The individial card, consisting of the image and text --}}
        <div class="heroSection card">
            <div class="imgAbout card__side card__side--front">
                <img src="{{ asset('images/Antoine.png') }}" class="heroImage" />
            </div>

            <div class="aboutInfo card__side card__side--back">
                <div class="card__cta">
                    <h2>Antoine Martin</h2>
                    <p>
                        Fullstack Developer and Business Computing Student
                    </p>
                    {{-- Social Media Links --}}
                    <div class="socialMediaLinks">
                        <ul>
                            <li>
                                <a href="https://www.linkedin.com/in/antomart/"><i class="fa-brands fa-linkedin"></i>
                                    &nbsp;
                                    <span>LinkedIn</span></a>
                            </li>

                            <li>
                                <a href="https://github.com/antomart96"><i class="fa-brands fa-github"></i> &nbsp;
                                    <span>GitHub</span></a>
                            </li>

                            <li>
                                <a href="martinanto96@hotmail.fr"><i class="fa-solid fa-envelope"></i> &nbsp;
                                    <span>Email</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Dany's Card --}}

        {{-- The individial card, consisting of the image and text --}}
        <div class="heroSection card">
            <div class="imgAbout card__side card__side--front">
                <img src="{{ asset('images/Dany.png') }}" class="heroImage" />
            </div>

            <div class="aboutInfo card__side card__side--back">
                <div class="card__cta">
                    <h2>Dany Lopes</h2>
                    <p>
                        Fullstack Developer and <br> Backend Architect
                    </p>
                    {{-- Social Media Links --}}
                    <div class="socialMediaLinks">
                        <ul>
                            <li>
                                <a href="https://www.linkedin.com/in/lg-dany/"><i class="fa-brands fa-linkedin"></i>
                                    &nbsp;
                                    <span>LinkedIn</span></a>
                            </li>

                            <li>
                                <a href="https://github.com/LopDa093"><i class="fa-brands fa-github"></i> &nbsp;
                                    <span>GitHub</span></a>
                            </li>

                            <li>
                                <a href="dany.lopes.goncalves@gmail.com"><i class="fa-solid fa-envelope"></i> &nbsp;
                                    <span>Email</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <footer>
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

</body>

</html>
