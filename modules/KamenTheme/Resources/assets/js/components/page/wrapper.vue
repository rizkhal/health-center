<script setup>
import { onMounted } from "vue";

const props = defineProps({
  filters: Object,
});
</script>
<template>
  <div class="bg-gray-100">
    <template v-for="(item, index) in filters" :key="index">
      <div
        class="px-2 lg:px-8 mt-10 pb-4 flex flex-row space-x-1 items-center"
        v-if="item"
      >
        <span class="py-1 px-2 bg-pink-600 text-pink-200 rounded-md">
          Filter: {{ item }}
        </span>
        <v-app-link
          :href="$route('post.article')"
          method="get"
          class="bg-pink-600 px-2 py-1 rounded-md text-pink-200"
        >
          <v-icon name="XIcon" class="w-4 h-4" />
        </v-app-link>
      </div>
    </template>

    <div
      class="mt-6 grid min-h-screen grid-cols-12 gap-0 px-2 lg:gap-4 lg:px-8"
    >
      <!-- left bar -->
      <div
        class="col-span-12 row-end-7 mt-6 lg:col-span-2 lg:row-end-1 lg:mt-0"
      >
        <slot name="leftbar">
          <kamen-leftbar />
        </slot>
      </div>

      <!-- center main -->
      <div class="col-span-12 lg:col-span-7">
        <div class="flex flex-col space-y-8">
          <slot name="main" />
        </div>
      </div>

      <!-- right bar -->
      <div class="col-span-12 mt-6 lg:col-span-3 lg:mt-0">
        <slot name="rightbar">
          <kamen-rightbar />
        </slot>
      </div>
    </div>
  </div>
</template>
