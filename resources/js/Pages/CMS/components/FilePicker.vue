<script setup>
  import { ref, defineEmits, watchEffect  } from 'vue'

  const emit = defineEmits([
    'fileSelected'
  ])

  const props = defineProps({
    label: String,
    defaultSrc: String,
    src: Object | String
  })

  const filePreviewUrl = ref(null)
  const filePicker = ref()

  const handleFilePick = (e) => {
    let file = e.target.files[0]

    emit('fileSelected', e)
  }

  watchEffect(() => {
    if (props.src instanceof File) {
      filePreviewUrl.value = URL.createObjectURL(props.src);
    } else if (typeof props.src == "string") {
      filePreviewUrl.value = `/storage/${props.src}`
    } else {
      filePreviewUrl.value = null
      filePicker.value = null
    }
  })
</script>

<template>
  <div v-if="filePreviewUrl" class="aspect-video">
    <img ref="filePicker" :src="filePreviewUrl" class="h-full w-full object-cover">
  </div>
  <label class="form-control w-full">
    <div class="label">
      <span v-if="label" class="label-text">{{ label }}</span>
    </div>
    <input @change="handleFilePick" type="file" class="file-input file-input-bordered w-full" />
  </label>
</template>