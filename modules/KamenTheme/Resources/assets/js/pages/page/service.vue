<script>
import KamenTheme from "Kamen/layouts/kamen.vue";

export default {
  layout: KamenTheme,
};
</script>
<script setup>
defineProps({
  service: Object,
});
</script>
<template>
  <div class="mx-auto bg-gray-100 p-10">
    <div class="content flex flex-col items-center justify-center space-y-8">
      <h1 class="mb-8 text-2xl font-semibold">PELAYANAN</h1>
      <div v-html="service?.content"></div>
    </div>
  </div>
</template>
