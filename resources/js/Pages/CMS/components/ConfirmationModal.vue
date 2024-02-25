<script setup>
  import { ref } from 'vue'

  const showModal = ref(false)

  const handleClose = () => {
    showModal.value = false
  }
</script>

<template>
  <dialog id="my_modal_2" class="modal" :class="{'modal-open': showModal}">
    <div class="modal-box">
      <div class="mb-3">
        <h3 class="text-center text-xl font-semibold">Are you sure you want to delete?</h3>
      </div>
      <div class="flex justify-center gap-5">
        <button @click="handleClose" class="btn btn-default">
          <i class="fa fa-times"></i> Cancel
        </button>
        <button class="btn btn-error text-white">
          <i class="fa fa-trash"></i> Delete
        </button>
      </div>
    </div>
  </dialog>
</template>