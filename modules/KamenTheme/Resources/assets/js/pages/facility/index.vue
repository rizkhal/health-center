<script>
import KamenTheme from "Kamen/layouts/kamen.vue";

export default {
  layout: KamenTheme,
};
</script>
<script setup>
defineProps({
  facility: Object,
});
</script>
<template>
  <div class="bg-gray-100 p-10 mx-auto">
    <div class="flex flex-col space-y-8 content justify-center items-center">
      <h1 class="text-2xl font-semibold mb-8">FASILITAS</h1>
      <div v-html="facility.content"></div>
    </div>
  </div>
</template>