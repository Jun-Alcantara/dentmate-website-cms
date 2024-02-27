import { defineStore } from "pinia"
import { ref } from 'vue'
import { useForm } from "@inertiajs/vue3"

export const createEditModalState = defineStore("createEditModal", () => {
  const createEditModalState = ref(false)
  const branch = ref(null)
  const form = useForm({
    id: null,
    image: null,
    name: '',
    address: '',
    email: '',
    contact_number: '',
    facebook: ''
  })
  const formOperation = ref('create')

  console.log(form)

  const open = () => createEditModalState.value = true
  const close = () => {
    reset()
    form.reset()
    form.clearErrors()
    createEditModalState.value = false
  }

  const setBranch = (b) => {
    form.id = b.id
    form.name = b.name
    form.address = b.address
    form.email = b.email
    form.contact_number  = b.contact_number
    form.facebook = b.facebook
    formOperation.value = 'update'
  }

  const reset = () => {
    createEditModalState.value = false
    branch.value = null
    formOperation.value = 'create'
  }

  return {
    createEditModalState, open, close, branch, setBranch, reset, form, formOperation
  }
})