<script setup>
  import { ref } from 'vue'
  import { useForm } from '@inertiajs/vue3'

  const emit = defineEmits(['closed'])

  const props = defineProps({
    showCreateModal: Boolean,
    service: Object
  })

  const showCreateModal = ref(props.showCreateModal)
  const form = useForm({
    image: null,
    id: props.service?.id,
    name: props.service?.name,
    description: props.service?.description
  })

  const closeModal = () => {
    form.reset()
    console.log('Closed')
    showCreateModal.value = false
    emit('closed')
  }

  const handleFileChange = (e) => {
    form.image = e.target.files[0]
  }

  const handleFormSubmit = () => {
    if (form.processing) return

    if (props.service) {
      form.patch(route('cms.services.updateService'), {
        onSuccess: () => closeModal(),
      })
    } else {
      form.post(route('cms.services.addService'), {
        onSuccess: () => closeModal()
      })
    }
  }
</script>

<template>
  <dialog class="modal" :class="{'modal-open' : showCreateModal}">
    <div class="modal-box">
      <form method="dialog">
        <button @click="closeModal" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
      </form>
      <div class="mt-7">
        <div v-if="service" class="mb-4">
          <img :src="`/storage/${service.photo_url}`" class="aspect-video object-cover">
        </div>
        <div>
          <input @change="handleFileChange" type="file" class="file-input file-input-bordered w-full" accept="image/png, image/jpeg" />
        </div>
        <div class="mt-4">
          <input v-model="form.name" type="text" placeholder="Service Name" class="input input-bordered w-full" :class="{'input-error': form.errors.name}">
          <span v-if="form.errors.name" class="text-error">{{ form.errors.name }}</span>
        </div>
        <div class="mt-4">
          <input v-model="form.description" type="text" placeholder="Description" class="input input-bordered w-full">
        </div>
        <div class="mt-4 flex justify-end">
          <button @click="handleFormSubmit" class="btn bg-fontSecondary"> 
            <span v-if="! form.processing">
              <i class="fa fa-save"></i> {{ service ? 'Save Changes' : 'Save' }}
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