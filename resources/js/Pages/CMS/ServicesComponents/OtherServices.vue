<script setup>
  import { ref } from 'vue'
  import { useForm } from '@inertiajs/vue3'

  const props = defineProps({
    services: Object
  })

  const stringifiedServices = () => {
    let reduce = props.services.map((service) => {
      return service.name;
    })

    return reduce.join('\n')
  }

  const form = useForm({
    services: stringifiedServices()
  })

  const showSuccessMessage = ref(false)

  const handleSaveClick = () => {
    form.patch(route('cms.otherServices.update'), {
      onSuccess: (response) => {
        showSuccessMessage.value = true
      }
    })
  }

  const handleOtherServicesType = () => {
    showSuccessMessage.value = false
  }
</script>

<template>
  <div class="max-w-screen-xl mx-auto mt-5">
    <div v-if="showSuccessMessage" role="alert" class="alert alert-success mb-5">
      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
      <span>Other services list has been updated</span>
    </div>
    <label class="form-control">
      <div class="label">
        <span class="label-text">Other Services (each services must be separated by a new line)</span>
      </div>
      <textarea v-model="form.services" @keyup="handleOtherServicesType" class="textarea textarea-bordered h-[350px]" rows="30"></textarea>
    </label>
    <div class="mt-3 flex justify-end">
      <button @click="handleSaveClick" class="btn bg-fontSecondary">
        <i class="fa fa-save"></i> Save
      </button>
    </div>
  </div>
</template>