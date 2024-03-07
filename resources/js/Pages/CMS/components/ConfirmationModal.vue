<script setup>
  import { confirmationModalState } from '@/stores/globalState'

  const confirmationModal = confirmationModalState()

  const handleConfirm = () => {
    confirmationModal.setConfirming(true)
    confirmationModal.confirmed()
  }
</script>

<template>
  <dialog id="my_modal_2" class="modal" :class="{'modal-open': confirmationModal.state}">
    <div class="modal-box">
      <div class="mb-3">
        <h3 class="text-center text-xl font-semibold">{{ confirmationModal.message }}</h3>
      </div>
      <div class="flex justify-center gap-5">
        <button @click="confirmationModal.close" class="btn btn-default">
          <i class="fa fa-times"></i> Cancel
        </button>
        <button @click="handleConfirm" class="btn btn-error text-white">
          <span v-if="confirmationModal.confirming" class="loading loading-ring loading-md"></span>
          <i v-else class="fa fa-trash"></i>
          Delete
        </button>
      </div>
    </div>
  </dialog>
</template>