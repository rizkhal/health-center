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
  <div class="mx-auto bg-gray-100 p-10">
    <div class="content flex flex-col items-center justify-center space-y-8">
      <h1 class="mb-8 text-2xl font-semibold">FASILITAS</h1>
      <div v-html="facility?.content"></div>
    </div>
  </div>
</template>
