<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dentmate Webiste</title>
    
    {{-- Third Party Dependencies --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    @vite('resources/css/site.css')
    @yield('styles')
  </head>
  <body>
    <nav class="bg-white shadow border-gray-200 max-w-full overflow-hidden border-2 border-red-"> 
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="./images/logo.jpg" class="h-12" alt="Dentmate Logo" />
          <span class="self-center text-2xl font-bold text-fontPrimary whitespace-nowrap">Dentmate</span>
        </a>
        <button id="navbar-toggle" data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
        </button> 
        <div id="nav-menu-list" class="hidden w-full md:block md:w-auto" id="navbar-default">
          <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
            <li class="flex items-center text-fontPrimary {{  request()->route()->getName() == "site.ourDoctors" ? 'font-bold border-b-2 border-fontSecondary' : '' }}">
              <a href="{{ route('site.ourDoctors') }}" class="navigation-item" aria-current="page">Doctors</a>
            </li> 
            <li class="flex items-center text-fontPrimary {{  request()->route()->getName() == "site.services" ? 'font-bold border-b-2 border-fontSecondary' : '' }}">
              <a href="{{ route('site.services') }}" class="navigation-item" aria-current="page">Services</a>
            </li>
            <li class="flex items-center text-fontPrimary {{  request()->route()->getName() == "site.ohp" ? 'font-bold border-b-2 border-fontSecondary' : '' }}">
              <a href="{{ route('site.ohp') }}" class="navigation-item" aria-current="page">Our Happy Patients</a>
            </li>
            <li class="flex items-center text-fontPrimary {{  request()->route()->getName() == "site.aboutUs" ? 'font-bold border-b-2 border-fontSecondary' : '' }}">
              <a href="{{ route('site.aboutUs') }}" class="navigation-item" aria-current="page">About Us</a>
            </li>
            <li>
              <a href="#booking-form-section" class="navigation-item bg-[#083d67] !px-[20px] !py-[10px] !text-[white] rounded-lg" aria-current="page">Book Now</a>
            </li>
          </ul>
        </div> 
      </div>
    </nav>

    <div class="min-h-[75vh]">
      @yield('content')
    </div>

    <section class="bg-[#083d67]">
      <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row justify-between items-center"> 
        <ul class="flex flex-col md:flex-row text-center gap-[25px] my-5 md:px-5 md:my-10">
          <li>
            <a href="#" class="text-white">About Us</a>
          </li>
          <li>
            <a href="#" class="text-white">Our Branches</a>
          </li>
          <li>
            <a href="#" class="text-white">Our Services</a>
          </li>
          <li>
            <a href="#" class="text-white">Book Now</a>
          </li>
        </ul>
        <div class="border-b-[1px] border-white w-full md:hidden"></div>
        <ul class="my-5 px-5">
          <li class="text-white">
            <i class="fa fa-facebook"></i> &nbsp;
            Dentmate San Juan - Facebook
          </li>
          <li class="text-white">
            <i class="fa fa-facebook"></i> &nbsp;
            Dentmate San Juan - Facebook
          </li>
          <li class="text-white">
            <i class="fa fa-facebook"></i> &nbsp;
            Dentmate San Juan - Facebook
          </li>
          <li class="text-white">
            <i class="fa fa-facebook"></i> &nbsp;
            Dentmate San Juan - Facebook
          </li>
          <li class="text-white">
            <i class="fa fa-facebook"></i> &nbsp;
            Dentmate San Juan - Facebook
          </li>
        </ul>
      </div>
    </section>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
      const navbarToggle = document.getElementById('navbar-toggle')
      const menuList = document.getElementById('nav-menu-list')

      navbarToggle.addEventListener('click', () => {
        menuList.classList.toggle('hidden')
      })
    </script>
    @yield('script')
  </body>
</html>