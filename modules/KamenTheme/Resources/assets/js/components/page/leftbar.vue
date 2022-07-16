<script setup>
import { onMounted } from "vue";

const props = defineProps({
  filters: Object,
});
</script>
<template>
  <div class="flex flex-col">
    <ul class="flex flex-col rounded-2xl bg-white shadow">
      <li
        v-for="(category, index) in $page.props.categories"
        :key="index"
        class="border-b p-3"
      >
        <div class="flex flex-row items-center justify-between">
          <v-app-link
            :href="`${$route('post.article', {
              category: category.name.toLowerCase(),
            })}`"
            class="
              font-semibold
              text-gray-800
              transition-all
              hover:text-pink-500
            "
            :class="{}"
          >
            {{ category.name }}
          </v-app-link>
          <span class="rounded-md bg-pink-500 px-2 py-1 text-pink-200">
            {{ category.posts_count }}
          </span>
        </div>
      </li>
    </ul>
  </div>
</template>
