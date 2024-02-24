@extends('layouts.site-layout')

@section('content')
  <section>
    <div class="">
      <div id="banner-slider">
        <div>
          <img src="./images/banners/1.jpg" alt="Banners" class="w-full">
        </div>
        <div>
          <img src="./images/banners/2.jpg" alt="Banners" class="w-full">
        </div>
        <div>
          <img src="./images/banners/3.jpg" alt="Banners" class="w-full">
        </div>
        <div>
          <img src="./images/banners/4.jpg" alt="Banners" class="w-full">
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white">
    <div class="max-w-screen-xl mx-auto pt-[90px] pb-[30px]">
      <h3 class="text-primary text-4xl font-semibold">Why Dentmate?</h3>
    </div>
    <div class="max-w-screen-xl mx-auto flex gap-[60px] pb-[90px]" data-aos="zoom-in">
      <div data-aos="zoom-in" class="basis-4/12">
        <img src="./images/why-dentmate/affordable.jpg" alt="" class="block">
        <h3 class="text-3xl text-primary font-semibold pb-3">Affordable</h3>
        <p>
          Dentmate offers high-quality dental care at budget-friendly prices.
        </p>
      </div>
      <div data-aos="zoom-in" class="basis-4/12">
      <img src="./images/why-dentmate/friendly.jpg" alt="" class="block">
        <h3 class="text-3xl text-primary font-semibold pb-3">Friendly</h3>
        <p>
          Dentmate boasts a welcoming environment with compassionate dental professionals.
        </p>
      </div>
      <div data-aos="zoom-in" class="basis-4/12">
      <img src="./images/why-dentmate/hygenic.jpg" alt="" class="block">
        <h3 class="text-3xl text-primary font-semibold pb-3">Hygenic</h3>
        <p>
          Dentmate flaunts rigorous cleanliness standards and prioritizes patient safety at every step
        </p>
      </div>
    </div>
    </div>  
  </section>

  <section>
    <div>
      <div id="before-and-after-slider">
        <div>
          <img src="./images/banners/2.jpg" alt="Banners" class="w-full">
        </div>
        <div>
          <img src="./images/banners/3.jpg" alt="Banners" class="w-full">
        </div>
        <div>
          <img src="./images/banners/4.jpg" alt="Banners" class="w-full">
        </div>
      </div>
    </div>
  </section>

  <section class="bg-gray-100">
    <div class="flex max-w-screen-xl mx-auto flex-wrap py-[60px]" data-aos="fade-up">
      
      <a href="/services.php" class="basis-3/12">
        <div class="flex flex-wrap  p-4">
          <div class="bg-[#083d67] w-full flex justify-center px-[50px] py-[40px] rounded">
            <h5 class="text-white flex flex-col justify-center items-center gap-[10px]">
              <span class="text-4xl">
                <i class="fa fa-user-md"></i> &nbsp;
              </span>
              <span>Service List 1</span>
            </h5>
          </div>
        </div>
      </a>

      <a href="services.php" class="basis-3/12">
        <div class="flex flex-wrap p-4">
          <div class="bg-[#083d67] w-full flex justify-center px-[50px] py-[40px] rounded">
            <h5 class="text-white flex flex-col justify-center items-center gap-[10px]">
              <span class="text-4xl">
                <i class="fa fa-heart"></i> &nbsp;
              </span>
              <span>Service List 2</span>
            </h5>
          </div>
        </div>
      </a>

      <a href="services.php" class="basis-3/12">
        <div class="flex flex-wrap p-4">
          <div class="bg-[#083d67] w-full flex justify-center px-[50px] py-[40px] rounded">
            <h5 class="text-white flex flex-col justify-center items-center gap-[10px]">
              <span class="text-4xl">
                <i class="fa fa-h-square"></i> &nbsp;
              </span>
              <span>Service List 3</span>
            </h5>
          </div>
        </div>
      </a>

      <a href="services.php" class="basis-3/12">
        <div class="flex flex-wrap p-4">
          <div class="bg-[#083d67] w-full flex justify-center px-[50px] py-[40px] rounded">
            <h5 class="text-white flex flex-col justify-center items-center gap-[10px]">
              <span class="text-4xl">
                <i class="fa fa-heartbeat"></i> &nbsp;
              </span>
              <span>Service List 4</span>
            </h5>
          </div>
        </div>
      </a>

      <a href="services.php" class="basis-3/12">
        <div class="flex flex-wrap p-4">
          <div class="bg-[#083d67] w-full flex justify-center px-[50px] py-[40px] rounded">
            <h5 class="text-white flex flex-col justify-center items-center gap-[10px]">
              <span class="text-4xl">
                <i class="fa fa-stethoscope"></i> &nbsp;
              </span>
              <span>Service List 5</span>
            </h5>
          </div>
        </div>
      </a>

      <a href="services.php" class="basis-3/12">
        <div class="flex flex-wrap p-4">
          <div class="bg-[#083d67] w-full flex justify-center px-[50px] py-[40px] rounded">
            <h5 class="text-white flex flex-col justify-center items-center gap-[10px]">
              <span class="text-4xl">
                <i class="fa fa-ambulance"></i> &nbsp;
              </span>
              <span>Service List 6</span>
            </h5>
          </div>
        </div>
      </a>

      <a href="services.php" class="basis-3/12">
        <div class="flex flex-wrap p-4">
          <div class="bg-[#083d67] w-full flex justify-center px-[50px] py-[40px] rounded">
            <h5 class="text-white flex flex-col justify-center items-center gap-[10px]">
              <span class="text-4xl">
                <i class="fa fa-tooth"></i> &nbsp;
              </span>
              <span>Service List 7</span>
            </h5>
          </div>
        </div>
      </a>

      <a href="services.php" class="basis-3/12">
        <div class="flex flex-wrap p-4">
          <div class="bg-[#083d67] w-full flex justify-center px-[50px] py-[40px] rounded">
            <h5 class="text-white flex flex-col justify-center items-center gap-[10px]">
              <span class="text-4xl">
                <i class="fa fa-medkit"></i> &nbsp;
              </span>
              <span>Service List 8</span>
            </h5>
          </div>
        </div>
      </a>

    </div>
  </section>

  @include('site.shared-sections.branches')

  @include('site.shared-sections.booking-form')
@endsection

@section('script')
  <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <script>
    $('#banner-slider').slick({
      arrows: false,
      autoplay: true,
      autoplaySpeed: 2000,
    });

    $('#before-and-after-slider').slick({
      arrows: false,
      autoplay: true,
      autoplaySpeed: 2000,
      // dots: true,
      fade: true,
    });
  </script>
@endsection