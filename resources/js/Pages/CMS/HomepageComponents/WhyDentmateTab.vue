<script setup>
  import WhyDentmateSlot from './WhyDentmateSlot.vue';

  const props = defineProps({
    slot1: null,
    slot2: null,
    slot3: null
  })
</script>

<template>
  <div class="grid grid-cols-3 gap-3">
    <WhyDentmateSlot :slot="slot1" :slotNumber="1" />
    <WhyDentmateSlot :slot="slot2" :slotNumber="2" />
    <WhyDentmateSlot :slot="slot3" :slotNumber="3" />
  </div>
</template>