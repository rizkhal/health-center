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
        class="mt-10 flex flex-row items-center space-x-1 px-2 pb-4 lg:px-8"
        v-if="item"
      >
        <span class="rounded-md bg-pink-600 py-1 px-2 text-pink-200">
          Filter: {{ item }}
        </span>
        <v-app-link
          :href="$route('post.article')"
          method="get"
          class="rounded-md bg-pink-600 px-2 py-1 text-pink-200"
        >
          <v-icon name="XIcon" class="h-4 w-4" />
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
