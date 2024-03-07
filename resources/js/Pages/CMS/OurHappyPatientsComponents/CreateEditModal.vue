<script setup>
  import { ref } from 'vue'
  import { useForm } from '@inertiajs/vue3'
  import FilePicker from '@/Pages/CMS/components/FilePicker.vue'

  const emit = defineEmits(['closed'])

  const props = defineProps({
    showModal: Boolean,
    testimonial: Object
  })

  const form = useForm({
    image: null,
    id: props.testimonial?.id,
    name: props.testimonial?.name,
    testimonial: props.testimonial?.testimonial
  })

  const closeModal = () => {
    form.reset()
    emit('close')
  }

  const handleFileChange = (e) => {
    form.image = e.target.files[0]
  }

  const handleFormSubmit = () => {
    if (form.processing) return

    if (props.testimonial) {
      form.post(route('cms.ohp.update'), {
        onSuccess: () => closeModal(),
      })
    } else {
      form.post(route('cms.ohp.create'), {
        onSuccess: () => closeModal()
      })
    }
  }
</script>

<template>
  <dialog class="modal" :class="{'modal-open' : showModal}">
    <div class="modal-box">
      <form method="dialog">
        <button @click="closeModal" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
      </form>
      <div class="mt-7">
        <FilePicker
          @fileSelected="handleFileChange"
          :src="form.image"
        />
        <div class="mt-4">
          <textarea 
            v-model="form.testimonial"
            class="textarea textarea-bordered h-24 w-full" 
            :class="{'textarea-error': form.errors.testimonial}"
            placeholder="Testimonial"
          ></textarea>
          <span v-if="form.errors.testimonial" class="text-error">{{ form.errors.testimonial }}</span>
        </div>
        <div class="mt-4">
          <input v-model="form.name" type="text" placeholder="Name" class="input input-bordered w-full">
        </div>
        <div class="mt-4 flex justify-end">
          <button @click="handleFormSubmit" class="btn bg-fontSecondary"> 
            <span v-if="! form.processing">
              <i class="fa fa-save"></i> {{ testimonial ? 'Save Changes' : 'Save' }}
            </span>
            <span v-else>
              <i class="fa fa-spinner spin"></i>
            </span>
          </button>
        </div>
      </div>
    </div>
  </dialog>
</template>