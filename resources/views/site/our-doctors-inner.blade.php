@extends('layouts.site-layout')

@section('styles')
  <style>
    p {
      margin-bottom: 10px;
    }
  </style>
@endsection

@section('content')
  <section>
    <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row md:gap-5 px-3 lg:px-0 mt-5 mb-5">
      <div class="basis-1/4">
        <img src="/storage/{{ $doctor->photo_url }}" alt="">
        <h1 class="text-2xl font-bold mt-3 text-fontPrimary">{{ $doctor->name }}</h1>
        <h3 class="font-semibold text-fontPrimary">{{ $branch->name }}</h3>
      </div>
      <div class="basis-3/4 mt-5 md:mt-0">
        {!! $doctor->content !!}
      </div>
    </div>
  </section>

  @include('site.shared-sections.doctors-list')
@endsection