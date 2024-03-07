<script setup>
  import { useForm } from '@inertiajs/vue3'
  import { newDoctorModalState } from '@/stores/ourDoctorsState'
  import { confirmationModalState } from '@/stores/globalState'

  import NewDoctorModal from './NewDoctorModal.vue'
  import ConfirmationModal from '@/Pages/CMS/components/ConfirmationModal.vue'

  const props = defineProps({
    doctors: Object
  })

  const newDoctorModal = newDoctorModalState()
  const confirmationModal = confirmationModalState()

  const handleAddDoctorClick = () => {
    newDoctorModal.open()
  }

  const handleEditClick = (doctor) => {
    newDoctorModal.setDoctor(doctor)
    newDoctorModal.open()
  }

  const handleDeletButtonClick = (doctor) => {
    confirmationModal.onConfirmAction(() => {
      const form = useForm({
        id: doctor.id
      })

      form.delete(route('cms.ourdoctors.deleteDoctor'), {
        onSuccess: () => {
          confirmationModal.close()
        },
        preserveScroll: true
      })
    })
    confirmationModal.open()
  }
</script>

<template>
  <div class="flex justify-end">
    <button @click="handleAddDoctorClick" class="btn bg-fontSecondary">
      <i class="fa fa-plus-circle"></i> Add Doctor
    </button>
  </div>
  <div class="overflow-x-auto">
    <table class="table">
      <!-- head -->
      <thead>
        <tr>
          <th>Photo</th>
          <th>Name</th>
          <th>Branch</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-if="doctors" v-for="doctor in doctors" :key="doctor.id">
          <td class="w-[200px]">
            <figure>
              <img :src="`/storage/${doctor.photo_url}`" class="h-[90px] object-cover mask mask-squircle">
            </figure>
          </td>
          <td>{{ doctor.name }}</td>
          <td>{{ doctor.branch?.name }}</td>
          <th >
            <div class="flex justify-end gap-3 items-center  ">
              <button @click="handleDeletButtonClick(doctor)" class="btn btn-error btn-sm text-white">
                <i class="fa fa-trash"></i>
              </button>
              <button @click="handleEditClick(doctor)" class="btn btn-primary btn-sm">
                <i class="fa fa-edit"></i>
              </button>
            </div>
          </th>
        </tr>
        <tr v-else>
          <td colspan="4" class="text-center">
            No doctors found
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <NewDoctorModal />
  <ConfirmationModal />
</template>