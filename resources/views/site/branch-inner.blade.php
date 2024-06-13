@extends('layouts.site-layout')

@section('content')
  <section class="bg-gray-100">
    <div class="max-w-screen-xl mx-auto py-5">
      <div class="flex flex-col md:flex-row px-5">
        <div class="relative md:block md:basis-[30%] md:mr-5">
          <img src="/storage/{{ $branch->banner_image }}" alt="" class="object-cover w-full h-auto">
          <div class="absolute bg-black bg-opacity-25 h-full w-full top-0 left-0 flex justify-center items-center">
            <div>
              <h1 class="text-3xl text-white font-bold text-center">{{ $branch->name }}</h1>
              <h5 class="text-white font-semibold text-center">
                {{ $branch->address }}
              </h5>
            </div>
          </div>
        </div>
        <div class="mt-5 md:mt-0">
          <div class="styled-title">
            <h1 class="text-fontPrimary font-semibold text-3xl mb-5">{{ $branch->name }}</h1>
          </div>
          <ul>
            <li>
              <i class="fa fa-home"></i> &nbsp; {{ $branch->address }}
            </li>
            <li>
              <i class="fa fa-phone"></i> &nbsp; {{ $branch->contact_number }}
            </li>
            <li>
              <i class="fa fa-envelope"></i> &nbsp; {{ $branch->email }}
            </li>
            <li>
              <svg class="inline h-[20px] w-[20px] mb-[5px]" xmlns="http://www.w3.org/2000/svg" viewBox="0,0,255.99098,255.99098">
                <g fill="#083d67" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,255.99098v-255.99098h255.99098v255.99098z" id="bgRectangle"></path></g><g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8.53333,8.53333)"><path d="M15,3c-6.627,0 -12,5.373 -12,12c0,6.016 4.432,10.984 10.206,11.852v-8.672h-2.969v-3.154h2.969v-2.099c0,-3.475 1.693,-5 4.581,-5c1.383,0 2.115,0.103 2.461,0.149v2.753h-1.97c-1.226,0 -1.654,1.163 -1.654,2.473v1.724h3.593l-0.487,3.154h-3.106v8.697c5.857,-0.794 10.376,-5.802 10.376,-11.877c0,-6.627 -5.373,-12 -12,-12z"></path></g></g>
              </svg> &nbsp; <a href="{{ $branch->facebook }}">{{ $branch->facebook }}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  @include('site.shared-sections.booking-form')
@endsection