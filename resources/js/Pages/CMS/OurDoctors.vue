<script setup>
  import { ref } from 'vue'

  import BannerImages from '@/Pages/CMS/OurDoctorsComponents/BannerImages.vue'
  import DocJustin from '@/Pages/CMS/OurDoctorsComponents/DocJustin.vue'
  import Doctors from '@/Pages/CMS/OurDoctorsComponents/Doctors.vue'

  const props = defineProps({
    banners: Object,
    content: Object,
    doctors: Object,
  })

  const activeTab = ref(1)

  const handleTabClick = (tabIndex) => activeTab.value = tabIndex
</script>

<script>
  import CMSLayout from '@/Pages/Layouts/CMSLayout.vue'

  export default {
    layout: CMSLayout
  }
</script>

<template>
  <div class="max-w-screen-xl mx-auto mt-5">
    <h1 class="text-fontPrimary text-2xl font-semibold">
      <i class="fa fa-stethoscope"></i>
      Our Doctors
    </h1>

    <div role="tablist" class="tabs tabs-bordered my-7">
      <a @click="handleTabClick(1)" role="tab" class="tab" :class="{'tab-active': activeTab == 1}">Banner Images</a>
      <a @click="handleTabClick(2)" role="tab" class="tab" :class="{'tab-active': activeTab == 2}">Doc Justin</a>
      <a @click="handleTabClick(3)" role="tab" class="tab" :class="{'tab-active': activeTab == 3}">Our Doctors</a>
    </div>

    <BannerImages v-if="activeTab == 1" :banners="banners" />
    <DocJustin v-if="activeTab == 2" :content="content" />
    <Doctors v-if="activeTab == 3" :doctors="doctors" />

    <!-- <div role="tablist" class="tabs tabs-lifted mt-7">
      <input type="radio" name="my_tabs_2" role="tab" class="tab min-w-[190px]" aria-label="Banner Images"/>
      <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
        <BannerImages :banners="banners" />
      </div>

      <input type="radio" name="my_tabs_2" role="tab" class="tab min-w-[190px]" aria-label="Doc Justin"/>
      <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
        <DocJustin :content="content" />
      </div>

      <input type="radio" name="my_tabs_2" role="tab" class="tab min-w-[190px]" aria-label="Our Doctors" checked/>
      <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
        <Doctors :doctors="doctors" />
      </div>
    </div> -->
  </div>
</template>