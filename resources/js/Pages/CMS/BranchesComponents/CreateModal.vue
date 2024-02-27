<script setup>
  import { createEditModalState } from '@/stores/branchState'

  const state = createEditModalState()

  const form = state.form

  const handleFilePick = (e) => {
    form.image = e.target.files[0]
  }

  const handleFormSubmit = () => {
    if (state.formOperation == 'update') {
      form.post(route('cms.branches.update'), {
        onSuccess: () => state.close()
      })
    }

    if (state.formOperation == 'create') {
      form.post(route('cms.branches.create'), {
        onSuccess: () => state.close()
      })
    }
  }

  const handleClose = () => {
    form.reset()
    state.close()
  }

  const debug = () => {
    console.log(form)
  }
</script>

<template>
  <dialog class="modal" :class="{'modal-open': state.createEditModalState}">
    <div class="bg-white w-[900px] px-7 py-8 rounded-xl">
      <form method="dialog" class="flex justify-end">
        <button @click="handleClose" class="btn btn-sm btn-circle btn-ghost right-2 top-2">✕</button>
      </form>
      <div class="mt-1">

        <div>
          <div class="label">
            <span class="label-text">Branch Photo</span>
          </div>
          <input @change="handleFilePick" type="file" class="file-input file-input-bordered w-full" accept="image/png, image/jpeg" />
        </div>

        <div class="form-control mt-3">
          <div class="label">
            <span class="label-text" :class="{'text-error': form.errors.name}">Branch Name</span>
          </div>
          <input v-model="form.name" type="text" class="input input-bordered w-full" :class="{'input-error': form.errors.name}">
          <span v-if="form.errors.name" class="text-error">{{ form.errors.name }}</span>
        </div>

        <div class="grid grid-cols-2 gap-3">
          <div class="form-control mt-3">
            <div class="label">
              <span class="label-text" :class="{'text-error': form.errors.address}">Address</span>
            </div>
            <input v-model="form.address" type="text" class="input input-bordered w-full" :class="{'input-error': form.errors.address}">
            <span v-if="form.errors.address" class="text-error">{{ form.errors.address }}</span>
          </div>
          <div class="form-control mt-3">
            <div class="label">
              <span class="label-text" :class="{'text-error': form.errors.email}">Email</span>
            </div>
            <input v-model="form.email" type="email" class="input input-bordered w-full" :class="{'input-error': form.errors.email}">
            <span v-if="form.errors.email" class="text-error">{{ form.errors.email}}</span>
          </div>
        </div>

        <div class="grid grid-cols-2 gap-3">
          <div class="form-control mt-3">
            <div class="label">
              <span class="label-text" :class="{'text-error': form.errors.contact_number}">Contact Number</span>
            </div>
            <input v-model="form.contact_number" type="text" class="input input-bordered w-full" :class="{'input-error': form.errors.contact_number}">
            <span v-if="form.errors.contact_number" class="text-error">{{ form.errors.contact_number }}</span>
          </div>
          <div class="form-control mt-3">
            <div class="label">
              <span class="label-text" :class="{'text-error': form.errors.facebook}">Facebook</span>
            </div>
            <input v-model="form.facebook" type="text" class="input input-bordered w-full" :class="{'input-error': form.errors.facebook}">
            <span v-if="form.errors.facebook" class="text-error">{{ form.errors.facebook }}</span>
          </div>
        </div>

        <div class="flex justify-end gap-3 mt-5">
          <button @click="debug" class="btn bg-fontPrimary text-white">
            View
          </button>
          <button @click="handleFormSubmit" class="btn bg-fontSecondary">
            <i class="fa fa-save"></i> Save Branch Details
          </button>
        </div>

      </div>
    </div>
  </dialog>
</template>