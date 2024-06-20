<script setup>
  import { Link } from '@inertiajs/vue3'

  const props = defineProps({
    posts: Object
  })

</script>

<template>
  <div class="flex justify-end mb-5">
    <Link :href="route('posts.create')" class="btn btn-warning">
      <i class="fa fa-plus-circle"></i>
      Create New Post
    </Link>
  </div>
  <div class="overflow-x-auto">
    <table class="table">
      <!-- head -->
      <thead>
        <tr>
          <th>Thumbnail</th>
          <th>Title</th>
          <th>Description</th>
          <th>
            
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="post in posts">
          <td class="w-[200px]">
            <figure>
              <img :src="`/storage/${post.thumbnail}`" class="h-[90px] aspect-square object-cover">
            </figure>
          </td>
          <td>{{ post.title }}</td>
          <td>{{ post.description }}</td>
          <td>
            <div class="flex justify-end items-center gap-[10px]">
              <button class="btn btn-error btn-sm text-white">
                <i class="fa fa-trash"></i>
              </button>
              <button class="btn btn-primary btn-sm text-white">
                <i class="fa fa-edit"></i>
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>