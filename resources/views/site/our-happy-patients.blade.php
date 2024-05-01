@extends('layouts.site-layout')

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
        <div class="flex md:mb-[70px] <?php if ($i % 2 === 0) { echo 'flex-row-reversexx'; } ?>" data-aos="slide-up">
          <div>
            <figure class="aspect-square w-[400px]">
              <img class="w-full h-full object-cover rounded-md" 
                src="{{ $testimonialAvatar }}" 
                alt=""
              >
            </figure>
          </div>
          <div class="<?php if ($i % 2 === 0) { echo 'right-quotexx'; } else { echo 'left-quotexx'; } ?>"></div>
          <div class="testimonial">
            <blockquote class="!mt-0 h-full flex items-center">
              {{ $testimonial->testimonial }}
            </blockquote>
          </div>
        </div>
      @endforeach
    </div>
    <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com --> 
    <div id="pagination">
      {{ $testimonials->links() }}
    </div>
    <nav class="hidden" aria-label="Page navigation example">
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
    </nav>

  </div>
</section>
@endsection