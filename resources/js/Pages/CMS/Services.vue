<script>
  import CMSLayout from '@/Pages/Layouts/CMSLayout.vue'

  export default {
    layout: CMSLayout
  }
</script>

<script setup>
  import { ref } from 'vue'
  import BannerImages from './ServicesComponents/BannerImages.vue'
  import ServicesTable from './ServicesComponents/ServicesTable.vue'
  import OtherServices from './ServicesComponents/OtherServices.vue'

  const props = defineProps({
    banners: Object,
    services: Object,
    otherServices: Object
  })


  const activeTab = ref(2)

  const handleTabClick = (tabIndex) => activeTab.value = tabIndex
</script>

<template>
  <div class="max-w-screen-xl mx-auto mt-5">
    <h1 class="text-fontPrimary text-2xl font-semibold mb-7">
      <i class="fa fa-tools"></i>
      Services
    </h1>

    <div role="tablist" class="tabs tabs-bordered my-7">
      <!-- <a @click="handleTabClick(1)" role="tab" class="tab" :class="{'tab-active': activeTab == 1}">Banner Images</a> -->
      <a @click="handleTabClick(2)" role="tab" class="tab" :class="{'tab-active': activeTab == 2}">Services</a>
      <a @click="handleTabClick(3)" role="tab" class="tab" :class="{'tab-active': activeTab == 3}">Other Services</a>
    </div>

    <!-- <BannerImages v-if="activeTab == 1" :banners="banners" /> -->
    <ServicesTable v-if="activeTab == 2" :services="services" />
    <OtherServices v-if="activeTab == 3" :services="otherServices" />
  </div>
</template>