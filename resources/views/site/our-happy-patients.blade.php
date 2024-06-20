@extends('layouts.site-layout')

@section('styles')
  <style>
    .slick-arrow {
      color: white;
      padding-left: 20px;
      padding-right: 20px;
      transition: 0.8s ease all;
    }

    .slick-prev,
    .slick-nex {
      transition: 0.8s ease all;
    }

    .slick-prev:hover {
      background: linear-gradient(to right, #000000ba, #00000000);
    }

    .slick-next:hover {
      background: linear-gradient(to right, #00000000, #000000ba);
    }

    .slick-custom-arrow {
      font-size: 40px;
    }
      .slick-dots li button {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background-color: gray; /* Default color for dots */
      border: none;
      opacity: 0.5;
      position: relative;
      text-indent: -9999px; /* Hide the numbers */
      overflow: hidden; /* Ensure hidden text doesn't affect layout */
    }

    /* Create the dots using ::before pseudo-element */
    .slick-dots li button::before {
      content: '';
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background-color: gray;
      display: block;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    /* Change the background color of active dot */
    .slick-dots li.slick-active button::before {
      background-color: blue; /* Active dot color */
      opacity: 1;
    }

    /* Change the background color of dots on hover */
    .slick-dots li button:hover::before {
      background-color: darkgray; /* Hover color */
      opacity: 0.8;
    }

    @media (max-width: 768px) {
      #slider-for {
        order: -1;
      }
    }
  </style>
@endsection

@section('content')
<section class="bg-gray-100">
  <div class="max-w-screen-xl mx-auto px-5 lg:px-0 py-[70px]">
    
    <div class="styled-title">
      <h1 class="text-3xl text-fontPrimary font-bold mb-[40px]">
        Our Happy Patients
      </h1>
    </div>

    <div class="grid grid-cols-12 gap-3">
      <div id="slider-nav" class="col-span-12 md:col-span-4">
        @foreach($testimonials as $i => $testimonial)
          @php 
            $testimonialAvatar = "https://ui-avatars.com/api/?background=random&size=300&name=$testimonial->name";
            if ($testimonial->photo_url) {
              $testimonialAvatar = generate_image_url($testimonial->photo_url);
            }
          @endphp
          <div class="h-[400px]">
            <img src="{{ $testimonialAvatar }}" class="h-full w-full object-cover">
          </div>
        @endforeach
      </div>

      <div id="slider-for" class="col-span-12 md:col-span-8">
        @foreach($testimonials as $i => $testimonial)
          <div class="h-[300px] md:h-[400px]">
            <img src="/storage/{{ $testimonial->before_after_photo_url }}" class="h-full w-full object-contain">
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

@include('site.shared-sections.booking-form')
@endsection

@section('script')
  <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script>
    $('#slider-nav').slick({
      prevArrow: '<button type="button" class="slick-custom-arrow slick-prev"> < </button>',
      nextArrow: '<button type="button" class="slick-custom-arrow slick-next"> > </button>',
      slidesToShow: 1,
      slidesToScroll: 1,
      asNavFor: '#slider-for',
      // centerMode: true,
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    })

    $('#slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '#slider-nav'
    });
  </script>
@endsection