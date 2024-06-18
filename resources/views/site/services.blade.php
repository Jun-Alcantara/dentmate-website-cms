@extends('layouts.site-layout')

@section('styles')
  <style>
    @media only screen and (min-width: 1300px) {
      #branches-slider {
        height: calc(100vh - 75px);
        overflow: hidden;
      }
    }
  </style>
@endsection

@section('content')
<section>
  <div id="branches-slider">

    @foreach ($branches as $branch)
      @continue(! $branch->banner_image)
      <div class="relative">
        <img class="w-full h-full block object-cover" src="{{ generate_image_url($branch->banner_image) }}" alt="">
        <div class="absolute bg-[#0000005c] h-full w-full top-0 flex items-center justify-start">
          <div class="pl-5 lg:pl-[150px]" data-aos="fade-right">
            <h3 class="text-white text-[2rem] md:text-[5.5rem] font-bold">{{ $branch->name }}</h3>
            <p class="text-white md:text-2xl lg:text-xl">
              {{ $branch->address }}
            </p>
          </div>
        </div>
      </div> 
    @endforeach
  </div>
</section>

<section class="bg-gray-100 px-5 lg:px-0 pb-[50px] pt-[50px] md:pt-[90px]">
  <div class="max-w-screen-xl mx-auto">
    <div class="styled-title">
      <h1 class="text-5xl mb-[2rem] text-fontPrimary">Our Services</h1>
    </div>

    @foreach($services as $service)
      <a href="/services/{{ $service->slug }}">
        <div class="flex flex-col md:flex-row gap-[20px] mb-[3rem]" data-aos="fade-up">
          <div class="basis-[20%]">
            <div class="aspect-square border-2 border-black">
              <img src="{{ generate_image_url($service->photo_url) }}" alt="" class="aspect-square object-cover">
            </div> 
          </div>
          <div class="basis-[80%]">
            <h3 class="text-3xl mb-[1rem]">{{ $service->name }}</h3>
            <p>{{ $service->description }}</p>
          </div>
        </div>
      </a>
    @endforeach

  </div>
  <div class="max-w-screen-xl mx-auto">
    <h3 class="text-fontPrimary text-2xl font-semibold text-center">
      Other Services
    </h3>
    <ul class="md:list-disc flex flex-col items-center md:flex-row md:flex-wrap gap-x-[50px] justify-center mt-5">
      @foreach ($otherServices as $oService) 
        <li>{{ $oService->name }}</li>
      @endforeach
    </ul>
  </div>
</section>

@include('site.shared-sections.booking-form')

@endsection

@section('script')
  <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script>
    $('#branches-slider').slick({
      arrows: false,
      autoplay: true,
      autoplayspeed: 2000,
      fade: true
    });
  </script>
@endsection