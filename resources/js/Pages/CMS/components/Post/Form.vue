<script>
  import CMSLayout from '@/Pages/Layouts/CMSLayout.vue';

  export default {
    layout: CMSLayout
  }
</script>

<script setup>
  import Editor from '@tinymce/tinymce-vue'
  import { useForm } from '@inertiajs/vue3'

  const form = useForm({
    content: null
  })
</script>

<template>
  <div class="max-w-screen-xl mx-auto pt-5">
    <h1 class="text-fontPrimary text-2xl font-semibold mb-7">
      <i class="fa fa-book-open"></i>
      Create New Post
    </h1>

    <div class="card bg-base-200 rounded-box p-5">
      <div class="mb-4">
        <label>Thumbnail</label>
        <input type="file" class="file-input file-input-bordered w-full" />
      </div>

      <div class="mb-4">
        <label>Title:</label>
        <input type="text" class="input input-bordered w-full" />
      </div>

      <div class="mb-4">
        <label>Description:</label>
        <textarea class="textarea textarea-bordered w-full" row="4"></textarea>
      </div>

      <div class="mb-4">
        <label class="font-semibold ml-2">Content:</label>
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
    </div>
  </div>
</template>