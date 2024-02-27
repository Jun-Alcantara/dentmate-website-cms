import { defineStore } from "pinia"
import { ref } from 'vue'

export const confirmationModalState = defineStore("confirmationModalState", () => {
  const state = ref(false)
  const message = ref('Are you sure you want to delete this record?')
  const confirmed = ref(() => {})

  const open = () => {
    state.value = true
  }

  const close = () => state.value = false

  const setMessage = (m) => {
    message.value = m
  }

  const onConfirmAction = (callback) => {
    confirmed.value = callback
  }

  return {
    state, open, close, setMessage, message, onConfirmAction, confirmed
  }
})