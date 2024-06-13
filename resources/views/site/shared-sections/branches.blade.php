<section class="pb-[90px] bg-gray-100 pt-7">
  <div class="max-w-screen-xl mx-auto text-center mb-2 md:mb-5">
    <div class="styled-title styled-title-center">
      <h1 class="text-4xl font-semibold text-[#083d67]">Our Branches</h1>
    </div>
  </div>
  <div class="max-w-screen-xl mx-auto flex flex-wrap justify-center">
    @foreach($branches as $branch)
      <a href="/branches/{{ $branch->slug }}" class="basis-1/2 md:basis-1/3 p-2">
        <div >
          <img src="{{ generate_image_url($branch->photo_url) }}" class="w-full h-full object-cover rounded-md">
        </div>
      </a>
    @endforeach
  </div>
</section>