@extends('layouts.site-layout')

@section('styles')
  <style>
    .slick-arrow {
      color: white;
      padding-left: 20px;
      padding-right: 20px;
    }

    .slick-prev {
      background-image: linear-gradient(to right, #000000ba, #00000000);
    }

    .slick-next {
      background-image: linear-gradient(to right, #00000000, #000000ba);
    }

    .slick-custom-arrow {
      font-size: 40px;
    }
  </style>
@endsection

@section('content')
<section>
  <div class="max-w-screen-xl mx-auto px-5 lg:px-0 py-[70px]">
    
    <div class="styled-title">
      <h1 class="text-3xl text-fontPrimary font-bold mb-[40px]">
        Our Happy Patients
      </h1>
    </div>

    

    <div>
      @foreach($testimonials as $i => $testimonial)
        @php 
          $testimonialAvatar = "https://ui-avatars.com/api/?background=random&size=300&name=$testimonial->name";
          if ($testimonial->photo_url) {
            $testimonialAvatar = generate_image_url($testimonial->photo_url);
          }
        @endphp
        <div class="grid grid-cols-12 gap-4 mb-5">
          <div class="col-span-12 md:col-span-3 h-[400px] bg-yellow-400">
            <img src="{{ $testimonialAvatar }}" class="h-full w-full object-cover">
            {{-- <img src="https://placehold.co/300x450" class="h-full w-full object-contain"> --}}
          </div>
          <div class="col-span-12 md:col-span-9">
            <div class="slider">
              @foreach($testimonial->images as $image)
                <div class="h-[400px]">
                  <img src="/storage/{{ $image->photo_url }}" class="h-full w-full object-contain">
                  {{-- <img src="https://placehold.co/1000x450" class="h-full w-full object-contain"> --}}
                </div>
              @endforeach
            </div>
          </div>
        </div>
      @endforeach
    </div>

    {{-- <div>
      @foreach($testimonials as $i => $testimonial)
        @php 
          $testimonialAvatar = "https://ui-avatars.com/api/?background=random&size=300&name=$testimonial->name";
          if ($testimonial->photo_url) {
            $testimonialAvatar = generate_image_url($testimonial->photo_url);
          }
        @endphp
        <div class="flex flex-col gap-[10px]">
          <div class="w-full md:w-[25%]">
            <figure class="aspect-square">
              <img class="w-full h-full object-cover rounded-md" 
                src="{{ $testimonialAvatar }}" 
                alt=""
              >
            </figure>
          </div>
          <div class="ohp-slider w-full w-full md:w-[75%] bg-gray-200 rounded-md p-2">
            @foreach($testimonial->images as $image)
              <div class="!h-[290px]">
                <img src="/storage/{{ $image->photo_url }}" alt="" class="w-full h-full object-contain">
              </div>
            @endforeach
          </div>
        </div>
      @endforeach
    </div> --}}
    <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com --> 
    {{-- <div id="pagination">
      {{ $testimonials->links() }}
    </div> --}}
    {{-- <nav class="hidden" aria-label="Page navigation example">
      <ul class="list-style-none flex justify-center">
        <li>
          <a
            class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100"
            href="#"
            >Previous</a
          >
        </li>
        <li>
          <a
            class="relative block rounded px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 font-bold !bg-fontSecondary"
            href="#"
            >1</a
          >
        </li>
        <li aria-current="page">
          <a
            class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100"
            href="#"
            >2</a
          >
        </li>
        <li>
          <a
            class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100"
            href="#"
            >3</a
          >
        </li>
        <li>
          <a
            class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100"
            href="#"
            >Next</a
          >
        </li>
      </ul>
    </nav> --}}

  </div>
</section>
@endsection

@section('script')
  <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script>
    $('.slider').slick({
      prevArrow: '<button type="button" class="slick-custom-arrow slick-prev"> < </button>',
      nextArrow: '<button type="button" class="slick-custom-arrow slick-next"> > </button>'
    })
  </script>
@endsection