@extends('layouts.site-layout')

@section('content')
  <style>
    @media only screen and (min-width: 1000px) {
      #doctors-banner {
        height: calc(100vh - 77px);
      }
    }
  </style>
  
  <section>
    <div id="doctors-banner" class="overflow-hidden">
      @foreach($banners as $banner)
      <div>
        <img src="{{ generate_image_url($banner->photo_url) }}" alt="Doctor's">
      </div>
      @endforeach
    </div>
  </section>

  <section class="bg-white rounded-md py-10 md:py-[80px] px-5">
    <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row gap-[20px]">
      <div class="basis-3/12" data-aos="fade-right">
        <img class="aspect-square object-cover shadow-xl" src="{{ generate_image_url($content->primary_photo_url) }}" alt="Doc Justin">
      </div>
      <div class="basis-9/12" data-aos="fade-left">
        <div class="styled-title">
          <h1 class="text-3xl font-semibold mb-5 text-fontPrimary">{{ $content->primary_title }}</h1>
        </div>
        <p>{{ $content->primary_writeup }}</p>
      </div>
    </div>
  </section>

  <section class="bg-gray-100">
    <div class="max-w-screen-xl mx-auto gap-[60px] py-10">
      <div class="styled-title styled-title-center">
        <h1 class="text-4xl text-center font-semibold text-fontPrimary mb-3">Our Doctors</h1>
      </div>
      <div class="flex flex-wrap gap-2 gap-y-5 md:gap-y-2 justify-center px-5">
        @foreach($doctors as $doctor)
          <div class="basis-[48%] md:basis-[32%] lg:basis-[24%] md:p-3">
            <div class="doctor-avatar bg-white rounded-md flex flex-col shadow cursor-pointer overflow-hidden">
              <div class="">
                <img class="aspect-square object-cover" src="{{ generate_image_url($doctor->photo_url) }}" alt="">
              </div>
              <div class=" flex justify-center items-center p-3">
                <div>
                  <h3 class="text-center text-fontPrimary font-bold">Doctor Name</h3>
                  <h5 class="text-center ">Pasig Branch</h5>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  @include('site.shared-sections.booking-form')

@endsection

@section('script')
  <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <script>
    $('#doctors-banner').slick({
      arrows: false,
      autoplay: true,
      autoplaySpeed: 2000,
    });
  </script>
@endsection