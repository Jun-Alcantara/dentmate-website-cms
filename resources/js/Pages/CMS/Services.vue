<script setup>
  import { ref } from 'vue'
  import { confirmationModalState } from '@/stores/globalState'
  import { useForm } from '@inertiajs/vue3'

  import CreateUpdateModal from '@/Pages/CMS/ServicesComponents/CreateUpdateModal.vue'
  import ConfirmationModal from '@/Pages/CMS/components/ConfirmationModal.vue'
  
  const confirmationModal = confirmationModalState()

  const props = defineProps({
    services: Object
  })

  const showCreateModal = ref(false)

  const editingService = ref(null)

  const handleToggleModalClick = () => {
    showCreateModal.value = !showCreateModal.value
  }

  const handleEditClick = (service) => {
    editingService.value = service
    handleToggleModalClick()
  }

  const handleModaClosedEvent = () => {
    handleToggleModalClick()
    editingService.value = null
  }

  const handleDeletButtonClick = (service) => {
    confirmationModal.setMessage(`Are you sure you want to delete ${service.name} service?`)
    confirmationModal.onConfirmAction(() => {
      useForm({
        id: service.id
      }).delete(route('cms.services.deleteService'), {
        onSuccess: confirmationModal.close()
      })
    })
    confirmationModal.open()
  }
</script>

<script>
  import CMSLayout from '@/Pages/Layouts/CMSLayout.vue'
  export default {
    layout: CMSLayout
  }
</script>

<template>
  <div class="max-w-screen-xl mx-auto mt-5">
    <h1 class="text-fontPrimary text-2xl font-semibold mb-7">
      <i class="fa fa-tools"></i>
      Services
    </h1>

    <div class="mb-5 flex justify-end">
      <button @click="handleToggleModalClick" class="btn bg-fontSecondary text-black">
        <i class="fa fa-plus-circle"></i> Add Service
      </button>
    </div>

    <div class="overflow-x-auto">
      <table class="table">
        <!-- head -->
        <thead>
          <tr>
            <th>Image Presentation</th>
            <th>Service Name</th>
            <th>Description</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="service in services" :key="service.id">
            <td class="w-[200px]">
              <figure>
                <img :src="`/storage/${service.photo_url}`" class="h-[90px] object-cover mask mask-squircle">
              </figure>
            </td>
            <td>{{ service.name }}</td>
            <td>{{ service.description }}</td>
            <th >
              <div class="flex justify-end gap-3 items-center  ">
                <button @click="handleDeletButtonClick(service)" class="btn btn-error btn-sm text-white">
                  <i class="fa fa-trash"></i>
                </button>
                <button @click="handleEditClick(service)" class="btn btn-primary btn-sm">
                  <i class="fa fa-edit"></i>
                </button>
              </div>
            </th>
          </tr>
        </tbody>
      </table>
    </div>

    <CreateUpdateModal 
      v-if="showCreateModal" 
      :service="editingService"
      :showCreateModal="showCreateModal"
      @closed="handleModaClosedEvent"
    />

    <ConfirmationModal />
  </div>
</template>