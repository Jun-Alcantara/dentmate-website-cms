<script setup>
  import { ref } from 'vue'
  import { useForm } from '@inertiajs/vue3'
  import Editor from '@tinymce/tinymce-vue'

  const emit = defineEmits(['closed'])

  const props = defineProps({
    showCreateModal: Boolean,
    service: Object
  })

  const showCreateModal = ref(props.showCreateModal)
  const form = useForm({
    image: null,
    id: props.service?.id,
    name: props.service?.name,
    description: props.service?.description,
    content: props.service?.content
  })

  const closeModal = () => {
    form.reset()
    console.log('Closed')
    showCreateModal.value = false
    emit('closed')
  }

  const handleFileChange = (e) => {
    form.image = e.target.files[0]
  }

  const handleFormSubmit = () => {
    if (form.processing) return

    if (props.service) {
      form.post(route('cms.services.updateService'), {
        onSuccess: () => closeModal(),
      })
    } else {
      form.post(route('cms.services.addService'), {
        onSuccess: () => closeModal()
      })
    }
  }

  const serviceImage = () => {
    if (! props.service) {
      return "https://placehold.co/400?text=Service Image"
    }

    return `/storage/${props.service.photo_url}`
  }
</script>

<template>
  <dialog class="modal" :class="{'modal-open' : showCreateModal}">
    <div class="modal-box w-[80vw] max-w-[80vw]">
      <form method="dialog">
        <button @click="closeModal" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
      </form>
      <div class="mt-7 flex flex-row gap-[10px]">
        <div class="mb-4 basis-3/12">
          <img :src="serviceImage()" class="aspect-video object-cover">
          <div class="mt-4">
            <label class="font-semibold ml-2">Thumbnail:</label>
            <input @change="handleFileChange" type="file" class="file-input file-input-bordered w-full" accept="image/png, image/jpeg" />
          </div>
        </div>
        <div class="basis-9/12">
          <div class="">
            <label class="font-semibold ml-2">Service Name:</label>
            <input v-model="form.name" type="text" placeholder="Service Name" class="input input-bordered w-full" :class="{'input-error': form.errors.name}">
            <span v-if="form.errors.name" class="text-error">{{ form.errors.name }}</span>
          </div>
          <div class="mt-4">
            <label class="font-semibold ml-2">Description:</label>
            <textarea v-model="form.description" type="text" placeholder="Description" class="input input-bordered w-full" rows="30"></textarea>
          </div>
          <div>
            <label class="font-semibold ml-2">Inner Page Content:</label>
            <Editor 
              v-model="form.content"
              api-key="no8pekez9ty5yc6jq7brbl5f0na1g8zz35vg3a7u9z6umqya"
              :initial-value="form.content"
              :init="{
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount  linkchecker list',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
              }"
            />
          </div>
          <div class="mt-4 flex justify-end">
            <button @click="handleFormSubmit" class="btn bg-fontSecondary"> 
              <span v-if="! form.processing">
                <i class="fa fa-save"></i> {{ service ? 'Save Changes' : 'Save' }}
              </span>
              <span v-else>
                <i class="fa fa-spinner spin"></i>
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </dialog>
</template>