@extends('layouts.site-layout')

@section('content')

  <section class="bg-gray-100">
    <div class="max-w-screen-xl mx-auto py-5 px-5">
      <div class="styled-title">
        <h1 class="text-3xl font-semibold mb-5 text-fontPrimary">{{ $service->name }}</h1>
      </div>
      <div class="flex flex-col md:flex-row">
        <div class="md:basis-[30%] mb-2 md:mr-3">
          <img src="/storage/{{ $service->photo_url }}" class="w-full object-cover h-auto">
        </div>
        <div>
          {{ $service->description }}
        </div>
      </div>
    </div>
  </section>

  @include('site.shared-sections.booking-form')
@endsection