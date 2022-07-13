<script>
import KamenTheme from "Kamen/layouts/kamen.vue";

export default {
  layout: KamenTheme,
};
</script>
<script setup>
const props = defineProps({
  articles: Object,
});
</script>
<template>
  <kamen-wrapper>
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
