<script setup>
  import TabContent from '@/Pages/CMS/HomepageComponents/TabContent.vue'

  const props = defineProps({
    banners: Object
  })

  console.log(props)
</script>

<script>
  import CMSLayout from '@/Pages/Layouts/CMSLayout.vue';

  export default {
    layout: CMSLayout
  }
</script>

<template>
  <div class="max-w-screen-xl mx-auto mt-5">
    <h1 class="text-fontPrimary text-2xl font-semibold">
      <i class="fa fa-home"></i>
      Homepage
    </h1>

    <div role="tablist" class="tabs tabs-lifted mt-7">
      <input type="radio" name="my_tabs_2" role="tab" class="tab min-w-[190px]" aria-label="Banner Images" checked />
      <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
        <TabContent :images="banners" />
      </div>

      <input type="radio" name="my_tabs_2" role="tab" class="tab min-w-[190px]" aria-label="Why Dentmate?" />
      <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">Tab content B</div>

      <input type="radio" name="my_tabs_2" role="tab" class="tab min-w-[190px]" aria-label="Before And After Slider" />
      <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">Tab content 3</div>
    </div>
  </div>
</template> 