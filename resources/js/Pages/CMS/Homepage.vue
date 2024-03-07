<script setup>
  import { ref } from 'vue'

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

  const activeTab = ref(1)

  const handleTabClick = (tabIndex) => {
    activeTab.value = tabIndex
  }
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

    <div role="tablist" class="tabs tabs-bordered my-7">
      <a @click="handleTabClick(1)" role="tab" class="tab" :class="{'tab-active': activeTab == 1}">Banner Images</a>
      <a @click="handleTabClick(2)" role="tab" class="tab" :class="{'tab-active': activeTab == 2}">Why Dentmate?</a>
      <a @click="handleTabClick(3)" role="tab" class="tab" :class="{'tab-active': activeTab == 3}">Before & After Slider</a>
    </div>

    <BannerImagesTab v-if="activeTab == 1" :images="banners" />
    <WhyDentmateTab v-if="activeTab == 2" :slot1="slot1" :slot2="slot2" :slot3="slot3" />
    <BeforeAndAfterTab v-if="activeTab == 3" :images="beforeAndAfter" />
  </div>
</template> 