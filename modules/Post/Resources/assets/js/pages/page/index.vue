<script setup>
defineProps({
  pages: Object,
});
</script>
<template>
  <div class="p-10">
    <div class="grid grid-cols-4 gap-4">
      <div
        v-for="(page, index) in pages"
        :key="index"
        class="rounded-md bg-white p-4 shadow"
      >
        <h1>
          <v-app-link :href="page.url">{{ index }}</v-app-link>
        </h1>
      </div>
    </div>
  </div>
</template>
