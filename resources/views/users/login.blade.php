@extends('layout') 
@section('content')
  

<section id="loginSection">
    <header>
    <h2>
        Login
    </h2>
    <p>Log into your account to post jobs</p>
</header>
<form class="form" action="/login" method="POST">
    @csrf
    @error('loginError')
        <p>{{ $message }}</p>
    @enderror

    <div>
        <label for="email">Email</label>
        <input type="email" name="email"
            value="{{ old('email') }}" />
        @error('email')
            <p >{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password">
            Password
        </label>
        <input type="password" name="password"
            value="{{ old('password') }}" />
        @error('password')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button>
            Sign In
        </button>
    </div>

</form>

 <div class="mt-8">
        <p>
            Don't have an account?
            <a href="/register" class="text-laravel">Register</a>
        </p>
    </div>



        <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4">
            <div class="w-full relative flex items-center justify-center">
                <button aria-label="slide backward" class="absolute z-30 left-0 ml-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer" id="prev">
                    <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                    <div id="slider" class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 1</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/DWrGxX6/carosel-2.png" alt="sitting area" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/tCfVky2/carosel-3.png" alt="sitting area" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/rFsGfr5/carosel-4.png" alt="sitting area" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/DWrGxX6/carosel-2.png" alt="sitting area" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/tCfVky2/carosel-3.png" alt="sitting area" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/rFsGfr5/carosel-4.png" alt="sitting area" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/DWrGxX6/carosel-2.png" alt="sitting area" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/tCfVky2/carosel-3.png" alt="sitting area" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="https://i.ibb.co/rFsGfr5/carosel-4.png" alt="sitting area" class="object-cover object-center w-full" />
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button aria-label="slide forward" class="absolute z-30 right-0 mr-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400" id="next">
                    <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
      
        <script>
let defaultTransform = 0;
function goNext() {
    defaultTransform = defaultTransform - 398;
    var slider = document.getElementById("slider");
    if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7) defaultTransform = 0;
    slider.style.transform = "translateX(" + defaultTransform + "px)";
}
next.addEventListener("click", goNext);
function goPrev() {
    var slider = document.getElementById("slider");
    if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
    else defaultTransform = defaultTransform + 398;
    slider.style.transform = "translateX(" + defaultTransform + "px)";
}
prev.addEventListener("click", goPrev);


        </script>



    </section>
@endsection
