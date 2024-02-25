<script setup>
  import { ref } from 'vue'
  import { useForm } from '@inertiajs/vue3'

  const props = defineProps({
    slot: Object,
    slotNumber: null
  })

  const form = useForm({
    slotNumber: props.slot?.slot_number ?? props.slotNumber,
    image: null,
    title: props.slot?.title ?? '',
    description: props.slot?.description ?? ''
  })

  const showModal = ref(false)

  const handleToggleModal = () => {
    showModal.value = !showModal.value
  }

  const handleFileChange = (e) => {
    form.image = e.target.files[0]
  }

  const handleSubmit = () => {
    form.post('/site-admin/homepage/why-dentmate', {
      onSuccess: () => handleToggleModal()
    })
  }
</script>

<template>
  <div v-if="slot" class="card bg-base-100 shadow-xl">
    <figure>
      <img :src="`/storage/${slot.photo_url}`" alt="Shoes" class="aspect-video object-cover" />
    </figure>
    <div class="p-3">
      <h2 class="card-title">{{ slot.title ?? null }}</h2>
      <p>{{ slot.description }}</p>
      <div class="mt-5 card-actions justify-end">
        <button @click="handleToggleModal" class="btn btn-primary">
          <i class="fa fa-edit"></i>
          Edit
        </button>
      </div>
    </div>
  </div>
  <div v-else class="border-2 text-center py-5 rounded-xl">
    <button @click="handleToggleModal" class="cursor-pointer">
      <i class="fa fa-edit"></i> Why dentmate slot
    </button>
  </div>

  <dialog class="modal" :class="{'modal-open': showModal}">
    <div class="modal-box">
      <form method="dialog">
        <button @click="handleToggleModal" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
      </form>
      <div class="mt-7">
        <figure v-if="slot?.photo_url" class="mb-4">
          <img :src="`/storage/${slot.photo_url}`" alt="" class="aspect-video w-full" />
        </figure>
        <div class="mb-4">
          <input @change="handleFileChange" type="file" class="file-input file-input-bordered w-full " accept="image/png, image/jpeg" />
        </div>
        <div class="mb-4">
          <input v-model="form.title" type="text" placeholder="Title" class="input input-bordered w-full" :class="{'input-error': form.errors.title}">
          <span v-if="form.errors.title" class="text-error">This field is required</span>
        </div>
        <input v-model="form.description" type="text" placeholder="Description" class="input input-bordered w-full">
        <div class="flex justify-end mt-4">
          <button @click="handleSubmit" class="btn btn-primary">
            <i class="fa fa-save"></i> Save
          </button>
        </div>
      </div>
    </div>
  </dialog>
</template>