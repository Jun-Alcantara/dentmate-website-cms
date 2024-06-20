@extends('layouts.site-layout')

@section('content')
  <section>
    <div class="w-full">
      <div class="relative about-us-banner-container">
        <img class="w-full h-full object-cover" src="/images/banners/about-us-cover.jpeg" alt="Doctor's">
        <div class="absolute w-full h-full top-0 bg-black/50 flex md:pl-[90px] md:pb-[90px] justify-center items-center md:items-end">
          <div>
            <h1 class="text-white text-4xl md:text-xl md:text-[5rem] font-bold" data-aos="fade-right">Meet the team!</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <article id="brand-story" class="bg-white">
    <div class="max-w-screen-xl mx-auto px-5">
      <div class="flex flex-col md:flex-row py-[50px] md:py-[90px]" data-aos="fade-left">
        <div class="basis-[25%] md:pt-[85px]">
          <div class="aspect-square border-2 boreder-red">
            <img src="{{ generate_image_url($content->our_story_photo_url ?? null) }}" class="w-full h-full object-cover">
          </div>
        </div>
        <div class="basis-[75%] md:pl-[1.5rem]">
          <div class="styled-title">
            <h1 class="text-fontPrimary font-semibold text-3xl mb-5">Our Story</h1>
          </div>
          <p>
            {!! nl2br($content->our_story_writeup ?? null) !!}
          </p>
        </div>
      </div>

      <div class="flex flex-col-reverse md:flex-row" data-aos="fade-right">
        <div class="basis-[75%] pr-[1.5rem]">
          <div class="styled-title">
            <h1 class="text-fontPrimary font-semibold text-3xl mb-5">Founders Story</h1>
          </div>
          <p>{!! nl2br($content->founders_writeup ?? null) !!}</p>
        </div>
        <div class="basis-[25%] md:pt-[85px]">
          <div class="aspect-square border-2 boreder-red">
            <img src="{{ generate_image_url($content->founders_photo_url ?? null) }}" class="w-full h-full object-cover">
          </div>
        </div>
      </div>

      <div class="flex flex-wrap justify-center pb-[90px] pt-[30px]">
        @foreach($founders as $founder)
          <div class="basis-1/2 md:basis-1/2 lg:basis-[25%] w-full p-[5px] md:p-[20px] flex flex-col" data-aos="fade-up">
            <img 
              class="aspect-square rounded-full border-[3px] border-fontSecondary object-cover"
              src="{{ generate_image_url($founder->photo_url) }}"
            >
          </div>
        @endforeach
      </div>

    </div>
  </article>

  <div class="">
    @include('site.shared-sections.branches')
  </div>

  <article id="management" class="bg-white pt-[50px]">
    <div class="max-w-screen-xl mx-auto pb-[40px] q">
      <div class="styled-title styled-title-center">
        <h1 class="text-3xl text-fontPrimary font-semibold text-center mb-[40px]">Management</h1>
      </div>
      <div class="flex flex-wrap justify-center">
        @foreach($managers as $manager)
          <div class="w-full basis-1/2 md:basis-1/2 lg:basis-[25%] p-[5px] md:p-[20px] flex flex-col" data-aos="fade-up">
            <img
              class="aspect-square rounded-full border-[3px] border-fontPrimary object-cover"
              src="{{ generate_image_url($manager->photo_url) }}"
            >
            <p class="text-[#083d67] text-center mt-3 font-bold text-xl">{{ $manager->name }}</p>
            <p class="text-[#083d67] text-center font-semibold">{{ $manager->position }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </article>

  @include('site.shared-sections.booking-form')
@endsection