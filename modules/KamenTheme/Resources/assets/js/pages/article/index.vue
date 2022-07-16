<script>
import KamenTheme from "Kamen/layouts/kamen.vue";

export default {
  layout: KamenTheme,
};
</script>
<script setup>
defineProps({
  articles: Object,
  filters: Object,
});
</script>
<template>
  <kamen-wrapper :filters="filters">
    <template #main>
      <div v-if="articles.data.length">
        <kamen-posts-card size="lg" :items="articles.data" />
      </div>
      <div v-else>
        <div class="flex flex-col items-center justify-center space-y-1">
          <v-icon name="InboxIcon" type="outline" class="h-24 w-24" />
          <h1 class="text-lg">Tidak ada data untuk ditampilkan</h1>
        </div>
      </div>
    </template>
    <template #rightbar>
      <div>
        <div class="flex flex-col space-y-4">
          <kamen-search-card :filters="filters" class="mb-4" />
        </div>
      </div>
    </template>
  </kamen-wrapper>
</template>
