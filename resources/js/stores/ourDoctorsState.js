import { defineStore } from "pinia"
import { ref } from 'vue'
import { useForm } from "@inertiajs/vue3"

export const newDoctorModalState = defineStore('newDoctorModalState', () => {
  const state = ref(false)
  const doctor = ref(null)
  const form = useForm({
    id: null,
    image: null,
    name: null,
    branch: null
  })

  const open = () => state.value = true
  const close = () => {
    form.reset()
    form.clearErrors()
    state.value = false
  }

  const setDoctor = (d) => {
    doctor.value = d

    // form.image = doctor.photo_url
    form.id = d.id
    form.name = d.name
    form.branch = d.branch?.id
  }

  return {
    state, open, close, form, setDoctor, doctor
  }
})