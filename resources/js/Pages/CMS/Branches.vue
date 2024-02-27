<script>
  import CMSLayout from '@/Pages/Layouts/CMSLayout.vue'
  export default {
    layout: CMSLayout
  }
</script>

<script setup>
  import { createEditModalState } from '@/stores/branchState'
  import { confirmationModalState } from '@/stores/globalState'
  import CreateModal from '@/Pages/CMS/BranchesComponents/CreateModal.vue'
  import ConfirmationModal from '@/Pages/CMS/components/ConfirmationModal.vue'
  import { useForm } from '@inertiajs/vue3'

  const props = defineProps({
    branches: Object
  })

  const createEditModal = createEditModalState()
  const confirmationModal = confirmationModalState()

  const handleDeleteBranch = (branch) => {
    confirmationModal.setMessage(`Are you sure you want to delete ${branch.name} from the list of branch?`)
    confirmationModal.onConfirmAction(() => {
      useForm({
        id: branch.id
      }).delete(route('cms.branches.delete'), {
        onSuccess: () => confirmationModal.close()
      })
    })
    confirmationModal.open()
  }

  const handleEditBranch = (branch) => {
    createEditModal.setBranch(branch)
    createEditModal.open()
  }
</script>

<template>
  <div class="max-w-screen-xl mx-auto mt-5">
    <h1 class="text-fontPrimary text-2xl font-semibold mb-7">
      <i class="fa fa-tools"></i>
      Branches
    </h1>

    <div class="mb-5 flex justify-end">
      <button @click="createEditModal.open" class="btn bg-fontSecondary text-black">
        <i class="fa fa-plus-circle"></i> New Branch
      </button>
    </div>

    <div class="overflow-x-auto">
      <table class="table">
        <!-- head -->
        <thead>
          <tr>
            <th>Image</th>
            <th>Branch Name</th>
            <th>Address</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="branch in branches" :key="branches.id">
            <td class="w-[200px]">
              <figure>
                <img :src="`/storage/${branch.photo_url}`" class="h-[90px] object-cover mask mask-squircle">
              </figure>
            </td>
            <td>{{ branch.name }}</td>
            <td>{{ branch.address }}</td>
            <th >
              <div class="flex justify-end gap-3 items-center  ">
                <button @click="handleDeleteBranch(branch)" class="btn btn-error btn-sm text-white">
                  <i class="fa fa-trash"></i>
                </button>
                <button @click="handleEditBranch(branch)" class="btn btn-primary btn-sm">
                  <i class="fa fa-edit"></i>
                </button>
              </div>
            </th>
          </tr>
        </tbody>
      </table>
    </div>

    <CreateModal />
    <ConfirmationModal />
  </div>
</template>