<script setup>
  import { ref, onMounted } from 'vue'
  import { newDoctorModalState } from '@/stores/ourDoctorsState'
  import axios from 'axios'
  import Editor from '@tinymce/tinymce-vue'

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
    <div class="modal-box w-[80vw] max-w-[80vw]">
      <form method="dialog" class="flex justify-end">
        <button @click="handleCloseModal" class="btn btn-sm btn-circle btn-ghost right-2 top-2">✕</button>
      </form>
      <div class="flex gap-[10px]">
        <div class="basis-3/12">
          <div v-if="newDoctorModal.doctor" class="aspect-square w-full mb-4 mx-auto">
            <img :src="`/storage/${newDoctorModal.doctor?.photo_url}`" alt="" class="object-cover w-full h-full">
          </div>
          <div class="form-group mb-4">
            <label class="label-text">Photo</label>
            <input @change="handleFileChange" type="file" class="file-input file-input-bordered w-full" />
          </div>
        </div>

        <div class="basis-9/12">
          <div class="form-group mb-4">
            <label class="font-semibold ml-2" :class="{'text-error': form.errors.name}">Name</label>
            <input v-model="form.name" type="text" class="input input-bordered w-full" :class="{'input-error': form.errors.name}">
            <span v-if="form.errors.name" class="text-error">{{ form.errors.name }}</span>
          </div>
          <div class="form-group mb-4">
            <label class="font-semibold ml-2" :class="{'text-error': form.errors.branch}">Branch</label>
            <select v-model="form.branch" class="select select-bordered w-full" :class="{'select-error': form.errors.branch}">
              <option v-for="branch in branches" :value="branch.id">{{ branch.name }}</option>
            </select>
            <span v-if="form.errors.branch" class="text-error">{{ form.errors.branch }}</span>
          </div>
          <div>
            <label class="font-semibold ml-2">Inner Page Content:</label>
            <Editor 
              v-model="form.content"
              api-key="no8pekez9ty5yc6jq7brbl5f0na1g8zz35vg3a7u9z6umqya"
              :initial-value="form.content"
              :init="{
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate mentions tableofcontents footnotes mergetags autocorrect typography inlinecss markdown list',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
              }"
            />
          </div>
          <div class="flex justify-end mt-3">
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
    </div>
  </dialog>
</template>