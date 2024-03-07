<script>
  import CMSLayout from '@/Pages/Layouts/CMSLayout.vue'

  export default {
    layout: CMSLayout
  }
</script>

<script setup>
  import { ref } from 'vue'
  import { useForm } from '@inertiajs/vue3'
  import { confirmationModalState } from '@/stores/globalState'

  import CreateEditModal from './OurHappyPatientsComponents/CreateEditModal.vue'
  import ConfirmationModal from '@/Pages/CMS/components/ConfirmationModal.vue'

  const confirmationModal = confirmationModalState()

  const props = defineProps({
    testimonials: Object
  })

  const editingTestimonial = ref(null)

  const showCreateEditModal = ref(false)

  const handleAddTestimonialClick = () => showCreateEditModal.value = true

  const handleModalClose = () => {
    showCreateEditModal.value = null
    showCreateEditModal.value = false
  }

  const handleEditClick = (testimonial) => {
    editingTestimonial.value = testimonial
    showCreateEditModal.value = true
  }

  const handleDeleteButtonClick = (testimonial) => {
    confirmationModal.onConfirmAction(() => {
      console.log(testimonial)
      useForm({
        id: testimonial.id
      }).delete(route('cms.ohp.delete'), {
        onSuccess: confirmationModal.close()
      })
    })
    confirmationModal.open()
  }
</script>

<template>
  <div class="max-w-screen-xl mx-auto mt-5">
    <h1 class="text-fontPrimary text-2xl font-semibold mb-7">
      <i class="fa fa-tools"></i>
      Our Happy Patients
    </h1>

    <div class="mb-5 flex justify-end">
      <button @click="handleAddTestimonialClick" class="btn bg-fontSecondary text-black">
        <i class="fa fa-plus-circle"></i> Add Testimonial
      </button>
    </div>

    <div class="overflow-x-auto">
      <table class="table">
        <!-- head -->
        <thead>
          <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Testimonial</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="testimonial in testimonials" :key="testimonial.id">
            <td class="w-[200px]">
              <figure>
                <img :src="`/storage/${testimonial.photo_url}`" class="h-[90px] object-cover mask mask-squircle">
              </figure>
            </td>
            <td>{{ testimonial.name }}</td>
            <td>{{ testimonial.testimonial }}</td>
            <th >
              <div class="flex justify-end gap-3 items-center  ">
                <button @click="handleDeleteButtonClick(testimonial)" class="btn btn-error btn-sm text-white">
                  <i class="fa fa-trash"></i>
                </button>
                <button @click="handleEditClick(testimonial)" class="btn btn-primary btn-sm">
                  <i class="fa fa-edit"></i>
                </button>
              </div>
            </th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <CreateEditModal v-if="showCreateEditModal" :testimonial="editingTestimonial" @close="handleModalClose" :showModal="showCreateEditModal" />
  
  <ConfirmationModal />

</template>