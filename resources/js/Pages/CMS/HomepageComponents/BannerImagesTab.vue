<script setup>
  import { ref } from 'vue'
  import { useForm, router } from '@inertiajs/vue3';

  const props = defineProps({
    images: Object
  })
  const fileInput = ref()
  const form = useForm({
    image: null
  })

  const handleAddImageClick = () => {
    fileInput.value.click()
  }

  const handleFileChange = (e) => {
    form.image = e.target.files[0]
    form.post('/site-admin/homepage/add-banner')
  }

  const handleRemoveImage = (id) => {
    form.image = id
    form.delete('/site-admin/homepage/remove-banner')
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

  <div class="flex flex-wrap w-full">
    <div v-for="image in props.images" class="basis-1/4 px-2 pb-3 aspect-video">
      <div class="rounded-md shadow overflow-hidden relative h-full group">
        <img :src="`/storage/${image.url}`" alt="" class="h-full object-cover">
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
</template>