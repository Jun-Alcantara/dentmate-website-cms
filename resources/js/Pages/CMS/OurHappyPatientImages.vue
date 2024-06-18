<script>
  import CMSLayout from '@/Pages/Layouts/CMSLayout.vue'

  export default {
    layout: CMSLayout
  }
</script>

<script setup>
  import { ref } from 'vue'
  import { Link, useForm } from '@inertiajs/vue3'

  const props = defineProps({
    testimonial: Object,
    banners: Array
  })

  const fileInput = ref()
  const form = useForm({
    image: null,
    page: `ohp:${props.testimonial.id}`
  })

  const handleAddImageClick = () => {
    fileInput.value.click()
  }

  const handleFileChange = (e) => {
    form.image = e.target.files[0]
    form.post(route('cms.banners.addBanner'))
  }

  const handleRemoveImage = (id) => {
    form.image = id
    form.delete(route('cms.banners.deleteBanner'))
  }
</script>

<template>
  <input 
    @change="handleFileChange"
    ref="fileInput" 
    type="file" 
    class="hidden" 
    accept="image/png, image/jpeg"
  />

  <div class="max-w-screen-xl mx-auto mt-5">
    <h1 class="text-fontPrimary text-2xl font-semibold mb-7">
      <i class="fa fa-tools"></i>
      Our Happy Patients
    </h1>

    <div class="mb-5">
      <Link :href="`/site-admin/our-happy-patients`">
        <i class="fa fa-arrow-left"></i> Back to list
      </Link>
    </div>

    <div class="flex bg-gray-100 rounded-md p-5">
      <div class="basis-[15%] mr-5">
        <img :src="`/storage/${testimonial.photo_url}`" alt="" class="w-full h-auto object-cover">
      </div>
      <div>
        {{ testimonial.testimonial }}
      </div>
    </div>

    <div class="mt-5">
      <h1 class="text-xl font-semibold pl-2">Slider Images</h1>
      <div class="flex flex-wrap w-full">
        <div v-for="image in props.banners" class="basis-1/4 px-2 pb-3 aspect-video">
          <div class="rounded-md shadow overflow-hidden relative h-full group">
            <img :src="`/storage/${image.photo_url}`" alt="" class="w-full h-full object-cover">
            <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-25 grid place-items-center hidden group-hover:grid">
              <span @click="handleRemoveImage(image.id)" class="bg-white rounded p-1 text-[13px] cursor-pointer">
                <i class="fa fa-times-circle"></i>
                remove image
              </span>
            </div>
          </div>
        </div>

        <div class="basis-1/4 px-2 pb-3 aspect-video">
          <div 
            @click="handleAddImageClick"
            class="rounded-md shadow overflow-hidden relative group h-full grid place-items-center cursor-pointer hover:bg-gray-300"
          >
            <span>
              <i class="fa fa-plus-circle"></i>
              Add Image
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>