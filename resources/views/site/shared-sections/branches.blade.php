<section id="our-branches" class="pb-[90px] bg-gray-100 pt-7">
  <div class="max-w-screen-xl mx-auto text-center mb-2 md:mb-5">
    <div class="styled-title styled-title-center">
      <h1 class="text-4xl font-semibold text-[#083d67]">Our Branches</h1>
    </div>
  </div>
  <div class="max-w-screen-xl mx-auto flex flex-wrap justify-center">
    @foreach($branches as $branch)
      <div class="basis-1/2 md:basis-1/3 p-2 relative branch-card">
        <div >
          <img src="{{ generate_image_url($branch->photo_url) }}" class="w-full h-full object-cover rounded-md">
        </div>
        <div class="absolute top-0 left-0 w-full h-full p-2 branch-overlay">
          <div class="h-full rounded bg-contain" style="background-size: cover !important; background: url('{{ generate_image_url($branch->banner_image) }}')">
            <div class="flex flex-col items-center justify-center gap-3 h-full bg-[#000000bf]">
              <a href="{{ $branch->facebook }}" target="_blank" class="text-white bg-[#1877F2] font-bold px-3 py-2 rounded-md">
                <i class="fa fa-facebook-official"></i>
                Go to Facebook
              </a>
              <hr class="overlay-divider bg-white border-white border-top-[1px]">
              <a href="{{ $branch->address_link }}" target="_blank" class="bg-white font-bold px-3 py-2 rounded-md">
                <i class="fa fa-map-pin"></i>
                Visit Us
              </a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>