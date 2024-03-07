<script>
  import CMSLayout from '@/Pages/Layouts/CMSLayout.vue'
  export default {
    layout: CMSLayout
  }
</script>

<script setup>
  import { ref } from 'vue'
  
  import OurStory from './AboutUsComponents/OurStory.vue'
  import FoundersStory from './AboutUsComponents/FoundersStory.vue'
  import BioListing from './AboutUsComponents/BioListing.vue'
  import ManagementPhotos from './AboutUsComponents/ManagementPhotos.vue'

  const props = defineProps({
    content: Object,
    founders: Object,
    managements: Object
  })

  const activeTab = ref(3)

  const handleTabClick = (tabIndex) => {
    activeTab.value = tabIndex
  }
</script>

<template>
  <div class="max-w-screen-xl mx-auto mt-5">
    <h1 class="text-fontPrimary text-2xl font-semibold mb-7">
      <i class="fa fa-book-open"></i>
      About Us
    </h1>

    <div role="tablist" class="tabs tabs-bordered my-7">
      <a @click="handleTabClick(1)" role="tab" class="tab" :class="{'tab-active': activeTab == 1}">Our Story</a>
      <a @click="handleTabClick(2)" role="tab" class="tab" :class="{'tab-active': activeTab == 2}">Founders Story</a>
      <a @click="handleTabClick(3)" role="tab" class="tab" :class="{'tab-active': activeTab == 3}">Founder Photos</a>
      <a @click="handleTabClick(4)" role="tab" class="tab" :class="{'tab-active': activeTab == 4}">Management Photos</a>
    </div>

    <OurStory :content="content" v-if="activeTab == 1" />
    <FoundersStory :content="content" v-if="activeTab == 2" />
    <BioListing :list="founders" type="founders" v-if="activeTab == 3" />
    <BioListing :list="managements" type="management" v-if="activeTab == 4" />
  </div>
</template>