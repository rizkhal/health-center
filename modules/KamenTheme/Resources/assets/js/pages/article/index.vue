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
      <kamen-posts-card size="lg" :items="articles.data" />
    </template>
    <template #rightbar>
      <div>
        <div class="flex flex-col space-y-4">
          <kamen-search-card class="mb-4" />
        </div>
      </div>
    </template>
  </kamen-wrapper>
</template>
