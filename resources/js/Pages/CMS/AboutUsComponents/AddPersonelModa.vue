<script setup>
  import { ref } from 'vue'
  import { useForm } from '@inertiajs/vue3'
  import FilePicker from '@/Pages/CMS/components/FilePicker.vue'

  const props = defineProps({
    modalState: Boolean,
    editing: Object,
    type: String
  })

  const emit = defineEmits(['closed'])

  const form = useForm({
    id: props.editing?.id,
    image: null,
    name: props.editing?.name,
    position: props.editing?.position,
    listGroup: props.type,
    bio: props.editing?.bio
  })

  const handleFileChange = (e) => {
    form.image = e.target.files[0]
  }

  const handleSubmit = () => {
    form.post(route('cms.aboutUs.createPersonel'), {
      onSuccess: (response) => {
        handleClose()
      }
    })
  }

  const handleClose = () => {
    emit('closed')
  }
</script>

<template>
  <dialog class="modal" :class="{'modal-open': modalState}">
    <div class="modal-box">
      <div class="mb-3">
        <FilePicker :src="form.image" @fileSelected="handleFileChange" />
      </div>
      <div class="mb-3" :class="{'text-error': form.errors.name}">
        <label>Full Name:</label>
        <input v-model="form.name" type="text" class="input input-bordered w-full" :class="{'input-error': form.errors.name}">
        <span v-if="form.errors.name" class="text-error">{{ form.errors.name }}</span>
      </div> 
      <div class="mb-3">
        <label :class="{'text-error': form.errors.position}">Position:</label>
        <input v-model="form.position" type="text" class="input input-bordered w-full" :class="{'input-error': form.errors.position}">
        <span v-if="form.errors.position" class="text-error">{{ form.errors.position }}</span>
      </div> 
      <div class="mb-3">
        <label>Bio:</label>
        <textarea 
          v-model="form.bio" type="text" 
          class="textarea textarea-bordered w-full" 
          :class="{'textarea-error': form.errors.bio}"
        ></textarea>
        <span v-if="form.errors.bio" class="text-error">{{ form.errors.bio }}</span>
      </div> 
      <div class="flex justify-end gap-3">
        <button @click="handleClose" class="btn btn-neutral">
          <i class="fa fa-times-circle"></i> Discard
        </button>
        <button @click="handleSubmit" class="btn bg-fontSecondary">
          <i class="fa fa-save"></i> Save Details
        </button>
      </div>
    </div>
  </dialog>
</template>