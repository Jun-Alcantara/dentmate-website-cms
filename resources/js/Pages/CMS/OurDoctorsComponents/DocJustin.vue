<script setup>
  import { ref } from 'vue'
  import { useForm } from '@inertiajs/vue3'

  const props = defineProps({
    content: Object
  })

  const fileInputRef = ref()
  const form = useForm({
    image: null,
    primary_title: props.content?.primary_title,
    primary_writeup: props.content?.primary_writeup
  })
  const filePreviewUrl = ref(props.content?.primary_photo_url ? `/storage/${props.content?.primary_photo_url}` : null)

  const handleAddImageClick = () => {
    fileInputRef.value.click()
  }

  const handleFileChange = (e) => {
    let file = e.target.files[0]
    form.image = file
    filePreviewUrl.value = URL.createObjectURL(file);
  }

  const handleSubmit = () => {
    console.log(form)

    form.post(route('cms.ourdoctors.updateDocJustin'))
  }
</script>

<template>
  <div class="w-full flex">
    <input @change="handleFileChange" ref="fileInputRef" type="file" class="hidden">
    <div class="basis-1/4 border-[1px] rounded-xl min-h-[50px] relative">
      <img v-if="filePreviewUrl" :src="filePreviewUrl" class="w-full h-full rounded-md object-cover">
      <div class="absolute hover:bg-[#22222261] w-full h-full grid place-items-center top-0 left-0 rounded-xl"> 
        <span @click="handleAddImageClick" class="cursor-pointer bg-fontPrimary text-white px-5 py-3 rounded-md">
          <i class="fa fa-refresh"></i> Change Image
        </span>
      </div>
    </div>
    <div class="basis-3/4 px-5">
      <div class="mb-3">
        <label for="">Primary Title</label>
        <input v-model="form.primary_title" type="text" class="input input-bordered w-full">
      </div>
      <div class="mb">
        <label for="">Write Up</label>
        <textarea v-model="form.primary_writeup" class="textarea textarea-bordered w-full min-h-[100px]"></textarea>
      </div>
      <div class="w-full mt-3 flex justify-end">
        <button @click="handleSubmit" class="btn bg-fontSecondary">
          <i class="fa fa-save"></i> Save Changes
        </button>
      </div>
    </div>
  </div>
  
</template>