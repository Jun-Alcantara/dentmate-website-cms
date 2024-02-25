<script setup>
  import BannerImagesTab from '@/Pages/CMS/HomepageComponents/BannerImagesTab.vue'
  import WhyDentmateTab from '@/Pages/CMS/HomepageComponents/WhyDentmateTab.vue'
  import BeforeAndAfterTab from '@/Pages/CMS/HomepageComponents/BeforeAndAfterTab.vue';

  const props = defineProps({
    banners: Object,
    slot1: Object,
    slot2: Object,
    slot3: Object,
    beforeAndAfter: Object
  })
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
        <BannerImagesTab :images="banners" />
      </div>

      <input type="radio" name="my_tabs_2" role="tab" class="tab min-w-[190px]" aria-label="Why Dentmate?" />
      <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
        <WhyDentmateTab :slot1="slot1" :slot2="slot2" :slot3="slot3"  />
      </div>

      <input type="radio" name="my_tabs_2" role="tab" class="tab min-w-[190px]" aria-label="Before And After Slider" />
      <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
        <BeforeAndAfterTab :images="beforeAndAfter" />
      </div>
    </div>
  </div>
</template> 