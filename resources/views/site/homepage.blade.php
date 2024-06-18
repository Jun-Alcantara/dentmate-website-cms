@extends('layouts.site-layout')

@section('content')
  <section>
    <div class="">
      <div id="banner-slider">
        @foreach($banners as $banner)
          <div class="aspect-video overflow-hidden homepage-slider-item">
            <img src="{{ generate_image_url($banner->url) }}" alt="Banners" class="w-full h-full max-h-full aspect-video object-cover">
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="bg-white">
    <div class="max-w-screen-xl mx-auto px-5 py-3 md:py-7 md:pt-[90px] pb-[20px] md:pb-[30px]">
      <div class="styled-title styled-title-center">
        <h1 class="text-4xl text-fontPrimary text-center font-semibold">Why Dentmate?</h1>
      </div>
    </div>
    <div class="max-w-screen-xl mx-auto px-5 flex flex-col md:flex-row justify-center md:gap-[60px] md:pb-[90px] mb-[35px]" data-aos="zoom-in">
      @for($i = 1; $i <= 3; $i++)
        @if(isset($whyDentmate) && isset($whyDentmate[$i]) && $wd = $whyDentmate[$i])
        <div class="basis-4/12 mb-3 flex gap-[10px] md:block">
          <img src="{{ generate_image_url($wd['photo_url']) }}" alt="" class="block shadow-md rounded-md w-[35%] md:w-full">
          <div>
            <h3 class="text-2xl lg:text-3xl lg:pt-1 text-fontSecondary font-semibold pb-1 md:text-left md:mt-3">{{ $wd['title'] }}</h3>
            <p class="md:text-left text-fontPrimary">
              {{ $wd['description'] }}
            </p>
          </div>
        </div>
        @endif
      @endfor
    </div>
  </section>

  <section>
    <div>
      <div id="before-and-after-slider">
        @foreach($beforeAndAfter as $ba)
          <div>
            <img src="{{ generate_image_url($ba['url']) }}" alt="Banners" class="w-full aspect-video max-h-[90vh] object-cover">
          </div>
        @endforeach
      </div>
    </div>
  </section>
  
  <section class="bg-gray-100 pt-7 md:py-[60px]">
    <div class="max-w-screen-xl mx-auto ">
      <div class="styled-title styled-title-center">
        <h1 class="text-4xl text-fontPrimary text-center font-semibold">Our Services</h1>
      </div>
    </div>

    <div class="max-w-screen-xl mx-auto md:mt-8 lg:mt-10">
      <div class="flex flex-wrap justify-center">
        @foreach ($services as $service)
          <a href="/services/{{ $service->slug }}" class="basis-1/2 md:basis-4/12 lg:basis-3/12" data-aos="fade-up">
            <div class="p-1 md:p-2">
              <div
                class="bg-[#083d67] w-full rounded grid place-items-center min-h-[150px] md:min-h-[300px] md:h-[200px]"
                style="background: url('{{ generate_image_url($service->photo_url) }}'); background-size: cover;"
              >
                <span class="px-5 text-white font-semibold text-center md:text-xl lg:text-2xl">
                  {{ $service->name }}
                </span>
              </div>
            </div>
          </a>
        @endforeach
      </div>
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