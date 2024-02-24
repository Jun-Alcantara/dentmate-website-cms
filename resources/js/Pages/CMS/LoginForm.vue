<script setup>
  import { useForm } from '@inertiajs/vue3'

  const form = useForm({
    email: null,
    password: null
  })

  const handleLogin = () => {
    form.post('/site-admin/login', {
      onSuccess: (response) => console.log(response)
    })
  }

</script>

<template>
  <section class="v-screen h-screen grid place-items-center">
    <div class="card w-1/4 bg-base-100 shadow-xl">
      <div class="card-body">
        <h2 class="font-semibold text-2xl text-center w-full text-fontPrimary mb-3">Dentmate Website CMS</h2>
        <form @submit.prevent="handleLogin">
          <div class="mb-3">
            <input type="text" placeholder="Email" class="input input-bordered w-full" v-model="form.email" :class="{'input-error': form.errors.email}">
            <span v-if="form.errors.email" class="text-error">{{ form.errors.email }}</span>
          </div>
          <div class="mb-3">
            <input type="password" placeholder="Password" class="input input-bordered w-full" v-model="form.password" :class="{'input-error': form.errors.password}">
            <span v-if="form.errors.password" class="text-error">{{ form.errors.password }}</span>
          </div>
          <div class="card-actions justify-end">
            <button class="btn btn-primary">
              <i class="fa fa-unlock"></i>
              Login
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
</template>