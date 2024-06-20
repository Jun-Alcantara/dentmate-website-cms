<script setup>
  import WhyDentmateSlot from './WhyDentmateSlot.vue';
  import Table from '../components/Post/Table.vue';

  const props = defineProps({
    slot1: null,
    slot2: null,
    slot3: null
  })

  const posts = [
    {
      thumbnail: 'images/posts-1235.jpg',
      title: 'Post Number 1',
      description: 'This is the description of post number 1',
    }
  ]
</script>

<template>
  <div class="max-w-screen-xl mx-auto">
    <Table :posts="posts" />
  </div>





  <!-- <div class="grid grid-cols-3 gap-3">
    <WhyDentmateSlot :slot="slot1" :slotNumber="1" />
    <WhyDentmateSlot :slot="slot2" :slotNumber="2" />
    <WhyDentmateSlot :slot="slot3" :slotNumber="3" />
  </div> -->
</template>