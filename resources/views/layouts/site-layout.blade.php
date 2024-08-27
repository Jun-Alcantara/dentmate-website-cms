<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dentmate Website</title>
    
    {{-- Third Party Dependencies --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
      .concert-one{
        font-family:  "Concert One", sans-serif;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;
      }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css" rel="stylesheet">

    <script src="/vendor/jquery.js"></script>
    <link href="/vendor/select2/select2.css" rel="stylesheet" />
    <script src="/vendor/select2/select2.js"></script>
    <link rel="stylesheet" href="/vendor/flatpickr/flatpickr.css">
    <link rel="stylesheet" href="/vendor/flatpickr/theme-material-blue.css">
    <link rel="stylesheet" href="/vendor/animate.css">
    <script src="/vendor/flatpickr/flatpickr.js"></script>
    <script src="/vendor/axios.js"></script>
    <script src="/vendor/day.js"></script>

    @vite('resources/css/site.css')
    @yield('styles')
  </head>
  <body>
    <nav class="bg-white shadow border-gray-200 max-w-full overflow-hidden"> 
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="/images/logo.png" class="h-[75px] pb-3" alt="Dentmate Logo" />
          <span class="self-center text-2xl font-bold text-fontPrimary whitespace-nowrap"></span>
        </a>
        <div class="flex flex-row gap-[10px]">
          <a href="#booking-form-section" class="md:hidden navigation-item bg-fontSecondary !px-[20px] !py-[10px] !text-[black] rounded-lg" aria-current="page">
            Book Now
          </a>
          <button id="navbar-toggle" data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
          </button> 
        </div>
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
            {{-- <li class="hidden md:block">
              <a href="#booking-form-section" class="navigation-item bg-fontSecondary !px-[20px] !py-[10px] !text-[black] rounded-lg" aria-current="page">Book an appointment</a>
            </li> --}}
          </ul>
        </div> 
      </div>
    </nav>

    <div class="min-h-[75vh]">
      @yield('content')
    </div>

    <section class="bg-[#083d67]">
      <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row gap-5 px-3 py-5"> 

        <div class="order-2 md:order-1 mt-3 md:mt-0 border-t-2 md:border-0 border-t-white basis-1/2 flex flex-col justify-center">
          <ul class="grid grid-cols-2 gap-3 text-center mt-5 md:mt-0 lg:text-left">
            <li>
              <a href="/about-us" class="text-white">About Us</a>
            </li>
            <li>
              <a href="/#our-branches" class="text-white">Our Branches</a>
            </li>
            <li>
              <a href="/services" class="text-white">Our Services</a>
            </li>
            <li>
              <a href="/our-happy-patients" class="text-white">Our Happy Patients</a>
            </li>
            <li>
              <a href="/#booking-form-section" class="text-white">Book Now</a>
            </li>
          </ul>
        </div>

        <div class="order-1 md:order-2 basis-1/2">
          <div>
            <h3 class="concert-one uppercase text-white text-2xl animate__animated animate__pulse animate__infinite	infinite animate__slow	1s">Explore More Smiles Here!</h3>
          </div>
          <div class="flex flex-col lg:flex-row lg:gap-5">
            <ul class="mt-3 text-white">
              <li>Visit our social media accounts:</li>
              @foreach($branches as $branch)
                <li class="text-white">
                  <svg class="inline h-[20px] w-[20px] mb-[5px]" xmlns="http://www.w3.org/2000/svg" viewBox="0,0,255.99098,255.99098">
                    <g fill="#083d67" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,255.99098v-255.99098h255.99098v255.99098z" id="bgRectangle"></path></g><g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8.53333,8.53333)"><path d="M15,3c-6.627,0 -12,5.373 -12,12c0,6.016 4.432,10.984 10.206,11.852v-8.672h-2.969v-3.154h2.969v-2.099c0,-3.475 1.693,-5 4.581,-5c1.383,0 2.115,0.103 2.461,0.149v2.753h-1.97c-1.226,0 -1.654,1.163 -1.654,2.473v1.724h3.593l-0.487,3.154h-3.106v8.697c5.857,-0.794 10.376,-5.802 10.376,-11.877c0,-6.627 -5.373,-12 -12,-12z"></path></g></g>
                  </svg>
                  <a href="{{ $branch->facebook }}" target="_blank">
                    {{ $branch->name }}
                  </a>
                </li>
              @endforeach
            </ul>
            <ul class="text-white mt-3">
              <li>For urgent concerns, please call:</li>
              <li>
                <svg class="inline h-[18px] w-[18px] mb-[5px]" fill="#ffffff" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"></path> <path d="M327.125,383.969c5.703,0.016,56.875-37.828,56.875-42.656s-57.266-40.906-62.219-40.906s-21.578,19.938-26.062,22.156 c-4.5,2.219-32.5,1.422-63.703-29.781c-31.219-31.188-41.875-67.109-41.875-72.75s26.031-23.062,26.75-27.156 S182.578,128,176.891,128S128,180.5,128,184.875s3.953,60.656,75.219,131.906S321.422,383.938,327.125,383.969z"></path> </g></svg>
                09920446404
              </li>
              <li>
                <svg class="inline h-[18px] w-[18px] mb-[5px]" fill="#ffffff" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"></path> <path d="M327.125,383.969c5.703,0.016,56.875-37.828,56.875-42.656s-57.266-40.906-62.219-40.906s-21.578,19.938-26.062,22.156 c-4.5,2.219-32.5,1.422-63.703-29.781c-31.219-31.188-41.875-67.109-41.875-72.75s26.031-23.062,26.75-27.156 S182.578,128,176.891,128S128,180.5,128,184.875s3.953,60.656,75.219,131.906S321.422,383.938,327.125,383.969z"></path> </g></svg>
                09920446406
              </li>
              <li>
                <svg class="inline h-[18px] w-[18px] mb-[5px]" fill="#ffffff" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"></path> <path d="M327.125,383.969c5.703,0.016,56.875-37.828,56.875-42.656s-57.266-40.906-62.219-40.906s-21.578,19.938-26.062,22.156 c-4.5,2.219-32.5,1.422-63.703-29.781c-31.219-31.188-41.875-67.109-41.875-72.75s26.031-23.062,26.75-27.156 S182.578,128,176.891,128S128,180.5,128,184.875s3.953,60.656,75.219,131.906S321.422,383.938,327.125,383.969z"></path> </g></svg>  
                09942046171
              </li>
              <li>
                <svg class="inline h-[18px] w-[18px] mb-[5px]" fill="#ffffff" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"></path> <path d="M327.125,383.969c5.703,0.016,56.875-37.828,56.875-42.656s-57.266-40.906-62.219-40.906s-21.578,19.938-26.062,22.156 c-4.5,2.219-32.5,1.422-63.703-29.781c-31.219-31.188-41.875-67.109-41.875-72.75s26.031-23.062,26.75-27.156 S182.578,128,176.891,128S128,180.5,128,184.875s3.953,60.656,75.219,131.906S321.422,383.938,327.125,383.969z"></path> </g></svg>  
                09920446405
              </li>
              <li>
                Inquiries for calls are open from 8AM to 5PM only. Thank you!
              </li>
            </ul>
          </div>
        </div>

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