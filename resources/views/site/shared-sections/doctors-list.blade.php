<section class="bg-gray-100">
  <div class="max-w-screen-xl mx-auto gap-[60px] py-10">
    <div class="styled-title styled-title-center">
      <h1 class="text-4xl text-center font-semibold text-fontPrimary mb-3">Our Doctors</h1>
    </div>
    <div class="flex flex-wrap gap-2 gap-y-5 md:gap-y-2 justify-center px-5">
      @foreach($doctors as $doctor)
        <div class="basis-[48%] md:basis-[32%] lg:basis-[24%] md:p-3">
          <a href="/doctors/{{ $doctor->slug }}" class="doctor-avatar bg-white rounded-md flex flex-col shadow cursor-pointer overflow-hidden">
            <div class="">
              <img class="aspect-square object-cover" src="{{ generate_image_url($doctor->photo_url) }}" alt="">
            </div>
            <div class=" flex justify-center items-center p-3">
              <div>
                <h3 class="text-center text-fontPrimary font-bold">{{ $doctor->name }}</h3>
                <h5 class="text-center ">{{ $doctor->branch->name }}</h5>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>