@extends('layouts.site-layout')

@section('styles')
  <style>
    ol, ul {
      list-style-type: disc;
      margin-left: 20px;
    }
  </style>
@endsection

@section('content')

  <section class="bg-gray-100">
    <div class="max-w-screen-xl mx-auto py-5 px-5">
      <div class="flex flex-col md:flex-row">
        <div class="mb-2 md:mr-3 basis-3/12">
          <img src="/storage/{{ $service->photo_url }}" class="w-full object-cover h-auto">
        </div>
        <div>
          <div class="styled-title">
            <h1 class="text-3xl font-semibold mb-5 text-fontPrimary">{{ $service->name }}</h1>
          </div>
          {!! $service->content !!}
        </div>
      </div>
    </div>
  </section>

  @include('site.shared-sections.booking-form')
@endsection