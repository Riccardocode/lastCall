@extends('layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- FONT AWESOME LINK --}}
  <script src="https://kit.fontawesome.com/9823a17fbf.js" crossorigin="anonymous"></script>
  <title>About Us</title>
</head>
<body>
  
</body>
</html>
{{-- About us page structure--}}
    <div class="choosingSection">

      {{-- The main container for all the cards --}}
<div class="imgSection">

{{--The individial card, consisting of the image and text --}}
  <div class="heroSection">
    <div class="imgAbout">
    <img src="{{ asset('images/Riccardo.jpeg') }}" alt="Riccardo Scalia">
    </div>
    <div class="aboutInfo">
      <h2>Riccardo Scalia</h2>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus dolor quae, omnis beatae recusandae dolores, inventore veniam eaque fugit quaerat sint minus tempora modi doloremque hic iusto sequi fuga amet.</p>
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

  {{--The individial card, consisting of the image and text --}}
  <div class="heroSection">
    <img src="{{ asset('images/Brandon.jpeg') }}" alt="Brandon Steffan">
    <div class="aboutInfo">
    <h2>Brandon Steffan</h2>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus dolor quae, omnis beatae recusandae dolores, inventore veniam eaque fugit quaerat sint minus tempora modi doloremque hic iusto sequi fuga amet.</p>

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

 {{--The individial card, consisting of the image and text --}}
  <div class="heroSection">
    <img src="{{ asset('images/Luiza.jpeg') }}" alt="Luiza Moshkin">
    <div class="aboutInfo">
      <h2>Luiza Moshkin</h2>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus dolor quae, omnis beatae recusandae dolores, inventore veniam eaque fugit quaerat sint minus tempora modi doloremque hic iusto sequi fuga amet.</p>
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

   {{--The individial card, consisting of the image and text --}}
  <div class="heroSection">
    <img src="{{ asset('images/Antoine.jpeg') }}" alt="Antoine Martin">
    <div class="aboutInfo">
      <h2>Antoine Martin</h2>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus dolor quae, omnis beatae recusandae dolores, inventore veniam eaque fugit quaerat sint minus tempora modi doloremque hic iusto sequi fuga amet.</p>
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


   {{--The individial card, consisting of the image and text --}}
  <div class="heroSection">
    <img src="{{ asset('images/Dany.png') }}" alt="Dany Lopes">
    <div class="aboutInfo">
      <h2>Dany Lopes</h2>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus dolor quae, omnis beatae recusandae dolores, inventore veniam eaque fugit quaerat sint minus tempora modi doloremque hic iusto sequi fuga amet.</p>
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