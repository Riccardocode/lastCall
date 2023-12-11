@extends('layout')
@section('content')
    <div class="choosingSection ">

        {{-- The main container for all the cards --}}
        <div class="imgSection">
            {{-- The individial card, consisting of the image and text --}}
            <div class="heroSection card transition">
                <div class="imgAbout">
                    <img src="{{ asset('images/Riccardo.png') }}" class="heroImage" />
                </div>
                <h2 class="transition">Riccardo Scalia</h2>

                <div class="aboutInfo">
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus
                        dolor quae, omnis beatae recusandae dolores, inventore veniam
                        eaque fugit quaerat sint minus tempora modi doloremque hic iusto
                        sequi fuga amet.
                    </p>
                    {{-- Social Media Links --}}
                    <div class="socialMediaLinks">
                        <ul>
                            <li>
                                <a href=""><i class="fa-brands fa-linkedin"></i> &nbsp;
                                    <span>LinkedIn</span></a>
                            </li>

                            <li>
                                <a href=""><i class="fa-brands fa-github"></i> &nbsp;
                                    <span>GitHub</span></a>
                            </li>

                            <li>
                                <a href=""><i class="fa-solid fa-envelope"></i> &nbsp;
                                    <span>Email</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            {{-- The individial card, consisting of the image and text --}}
            <div class="heroSection">
                <div class="imgAbout">
                    <img src="{{ asset('images/Brandon.png') }}" alt="Brandon Steffan" class="heroImage">
                </div>
                <div class="aboutInfo">
                    <h2>Brandon Steffan</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus dolor quae, omnis beatae
                        recusandae
                        dolores, inventore veniam eaque fugit quaerat sint minus tempora modi doloremque hic iusto sequi
                        fuga amet.</p>

                    {{-- Social Media Links --}}
                    <div class="socialMediaLinks">
                        <ul>
                            <li>
                                <a href=""><i class="fa-brands fa-linkedin"></i> &nbsp; <span>LinkedIn</span></a>
                            </li>

                            <li>
                                <a href=""><i class="fa-brands fa-github"></i> &nbsp; <span>GitHub</span></a>
                            </li>

                            <li>
                                <a href=""><i class="fa-solid fa-envelope"></i> &nbsp; <span>Email</span></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            {{-- The individial card, consisting of the image and text --}}
            <div class="heroSection">
                <div class="imgAbout">
                    <img src="{{ asset('images/Luiza.png') }}"alt="Luiza Moshkin" class="heroImage">
                </div>
                <div class="aboutInfo">
                    <h2>Luiza Moshkin</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus dolor quae, omnis beatae
                        recusandae
                        dolores, inventore veniam eaque fugit quaerat sint minus tempora modi doloremque hic iusto sequi
                        fuga amet.</p>
                    {{-- Social Media Links --}}
                    <div class="socialMediaLinks">
                        <ul>
                            <li>
                                <a href=""><i class="fa-brands fa-linkedin"></i> &nbsp; <span>LinkedIn</span></a>
                            </li>

                            <li>
                                <a href=""><i class="fa-brands fa-github"></i> &nbsp; <span>GitHub</span></a>
                            </li>

                            <li>
                                <a href=""><i class="fa-solid fa-envelope"></i> &nbsp; <span>Email</span></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>


            {{-- The individial card, consisting of the image and text --}}
            <div class="heroSection">
                <div class="imgAbout">
                    <img src="{{ asset('images/Antoine.png') }}" alt="Antoine Martin" class="heroImage">
                </div>
                <div class="aboutInfo">
                    <h2>Antoine Martin</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus dolor quae, omnis beatae
                        recusandae
                        dolores, inventore veniam eaque fugit quaerat sint minus tempora modi doloremque hic iusto sequi
                        fuga amet.</p>
                    {{-- Social Media Links --}}
                    <div class="socialMediaLinks">
                        <ul>
                            <li>
                                <a href=""><i class="fa-brands fa-linkedin"></i> &nbsp; <span>LinkedIn</span></a>
                            </li>

                            <li>
                                <a href=""><i class="fa-brands fa-github"></i> &nbsp; <span>GitHub</span></a>
                            </li>

                            <li>
                                <a href=""><i class="fa-solid fa-envelope"></i> &nbsp; <span>Email</span></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>


            {{-- The individial card, consisting of the image and text --}}
            <div class="heroSection">
                <div class="imgAbout">
                    <img src="{{ asset('images/Dany.png') }}" alt="Dany Lopes" class="heroImage">
                </div>
                <div class="aboutInfo">
                    <h2>Dany Lopes</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus dolor quae, omnis beatae
                        recusandae
                        dolores, inventore veniam eaque fugit quaerat sint minus tempora modi doloremque hic iusto sequi
                        fuga amet.</p>
                    {{-- Social Media Links --}}
                    <div class="socialMediaLinks">
                        <ul>
                            <li>
                                <a href=""><i class="fa-brands fa-linkedin"></i> &nbsp; <span>LinkedIn</span></a>
                            </li>

                            <li>
                                <a href=""><i class="fa-brands fa-github"></i> &nbsp; <span>GitHub</span></a>
                            </li>

                            <li>
                                <a href=""><i class="fa-solid fa-envelope"></i> &nbsp; <span>Email</span></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
