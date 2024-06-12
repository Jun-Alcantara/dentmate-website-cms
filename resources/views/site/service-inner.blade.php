@extends('layouts.site-layout')

@section('content')

  <section class="bg-gray-100">
    <div class="max-w-screen-xl mx-auto py-5">
      <h1 class="text-3xl font-bold text-[#083d67]">{{ $service->name }}</h1>
      <div class="flex">
        <div class="basis-[25%]">
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