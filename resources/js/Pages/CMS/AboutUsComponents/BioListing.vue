<script setup>
  import { ref } from 'vue'
  import { useForm } from '@inertiajs/vue3'
  import { confirmationModalState } from '@/stores/globalState'

  import AddPersonelModa from './AddPersonelModa.vue'
  import ConfirmationModal from '@/Pages/CMS/components/ConfirmationModal.vue'

  const confirmationModal = confirmationModalState()

  const props = defineProps({
    list: Object,
    type: String
  })
  
  const modalState = ref(false)

  const editingItem = ref(null)

  const modalClose = () => {
    modalState.value = false
  }

  const modalOpen = () => {
    modalState.value = true
  }

  const handleDeletButtonClick = (item) => {
    confirmationModal.onConfirmAction(() => {
      useForm({
        id: item.id
      }).delete(route('cms.aboutUs.deletePersonel'), {
        onSuccess: () => confirmationModal.close()
      })
    })
    confirmationModal.open()
  }

  const handleEditClick = (item) => {
    editingItem.value = item
    modalOpen()
  } 
</script>

<template>
  <div class="flex justify-end mb-5">
    <button @click="modalOpen" class="btn bg-fontSecondary">
      <i class="fa fa-plus-circle"></i> Add New Record  
    </button>
  </div>

  <div class="overflow-x-auto">
    <table class="table">
      <!-- head -->
      <thead>
        <tr>
          <th>Photo</th>
          <th>Name</th>
          <th>Position</th>
          <th>Bio</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in list" :key="item.id">

          <td class="w-[200px]">
            <figure>
              <img :src="`/storage/${item.photo_url}`" class="h-[90px] object-cover mask mask-squircle">
            </figure>
          </td>
          <td>{{ item.name }}</td>
          <td>{{ item.position }}</td>
          <td>{{ item.bio }}</td>
          <th>
            <div class="flex justify-end gap-3 items-center  ">
              <button @click="handleDeletButtonClick(item)" class="btn btn-error btn-sm text-white">
                <i class="fa fa-trash"></i>
              </button>
              <button @click="handleEditClick(item)" class="btn btn-primary btn-sm">
                <i class="fa fa-edit"></i>
              </button>
            </div>
          </th>
        </tr>
      </tbody>
    </table>

    <AddPersonelModa v-if="modalState" :editing="editingItem" :type="type" @closed="modalClose" :modalState="modalState" />

    <ConfirmationModal />
  </div>
</template>