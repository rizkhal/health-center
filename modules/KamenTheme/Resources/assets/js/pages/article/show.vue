<script>
import KamenTheme from "Kamen/layouts/kamen.vue";

export default {
  layout: KamenTheme,
};
</script>
<script setup>
defineProps({
  article: Object,
});
</script>
<template>
  <kamen-wrapper>
    <template #main>
      <div>
        <div class="flex flex-col space-y-8">
          <kamen-post-card :item="article" size="lg" />
          <div v-html="article.content"></div>
        </div>
      </div>
    </template>
    <template #rightbar>
      <div>
        <!-- <PageHeading title="Related News" right-text="See All" /> -->

        <div class="flex flex-col space-y-4">
          <!-- <SubscribeNewsLatter class="mb-4" /> -->

          <!-- <CardPost
            v-for="(item, index) in Array.from({ length: 4 })"
            :key="index"
            size="sm"
          /> -->
        </div>
      </div>
    </template>
  </kamen-wrapper>
</template>
