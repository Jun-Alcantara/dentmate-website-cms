<script setup>
  import { ref, onMounted } from 'vue'
  import { newDoctorModalState } from '@/stores/ourDoctorsState'
  import axios from 'axios';

  const branches = ref([])

  const newDoctorModal = newDoctorModalState()
  const form = newDoctorModal.form

  const handleCloseModal = () => {
    newDoctorModal.close()
  }

  const handleSubmit = () => {
    if (form.processing) return;

    if (newDoctorModal.doctor) {
      form.post(route('cms.ourdoctors.updateDoctor'), {
        onSuccess: () => newDoctorModal.close()
      })
    } else {
      form.post(route('cms.ourdoctors.addDoctor'), {
        onSuccess: () => newDoctorModal.close()
      })
    }
  }

  const handleFileChange = (e) => {
    form.image = e.target.files[0]
  }

  onMounted(() => {
    axios.get('/api/branches')
      .then((response) => {
        branches.value = response.data
      })
  })
</script>

<template>
  <dialog class="modal" :class="{'modal-open' : newDoctorModal.state}">
    <div class="modal-box">
      <form method="dialog" class="flex justify-end">
        <button @click="handleCloseModal" class="btn btn-sm btn-circle btn-ghost right-2 top-2">✕</button>
      </form>
      <div>
        <div v-if="newDoctorModal.doctor" class="aspect-square w-[200px] mb-4 mx-auto">
          <img :src="`/storage/${newDoctorModal.doctor?.photo_url}`" alt="" class="object-cover w-full h-full">
        </div>
        <div class="form-group mb-4">
          <label class="label-text">Photo</label>
          <input @change="handleFileChange" type="file" class="file-input file-input-bordered w-full" />
        </div>
        <div class="form-group mb-4">
          <label class="label-text" :class="{'text-error': form.errors.name}">Name</label>
          <input v-model="form.name" type="text" class="input input-bordered w-full" :class="{'input-error': form.errors.name}">
          <span v-if="form.errors.name" class="text-error">{{ form.errors.name }}</span>
        </div>
        <div class="form-group mb-4">
          <label class="label-text" :class="{'text-error': form.errors.branch}">Branch</label>
          <select v-model="form.branch" class="select select-bordered w-full" :class="{'select-error': form.errors.branch}">
            <option v-for="branch in branches" :value="branch.id">{{ branch.name }}</option>
          </select>
          <span v-if="form.errors.branch" class="text-error">{{ form.errors.branch }}</span>
        </div>
        <div class="flex justify-end">
          <button @click="handleSubmit" class="btn bg-fontSecondary">
            <span v-if="form.processing">
              <i class="fa fa-spinner fa-spin"></i> Saving...
            </span>
            <span v-else>
              <i class="fa fa-save"></i> Save
            </span>
          </button>
        </div>
      </div>
    </div>
  </dialog>
</template>