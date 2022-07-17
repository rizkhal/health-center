<template>
  <div
    class="
      grid grid-cols-2
      items-center
      gap-4
      bg-white
      py-4
      px-2
      shadow
      lg:grid-cols-12 lg:px-8
    "
  >
    <div class="lg:col-span-2">
      <v-app-link :href="$route('post.home')" class="text-2xl font-bold">
        <img
          v-if="logo?.logo"
          :src="logo?.logo"
          :alt="logo?.logo_alternative"
        />
        <span v-else>{{ logo.logo_alternative }}</span>
      </v-app-link>
    </div>
    <div class="ml-auto inline lg:hidden">
      <button
        class="
          rounded-md
          p-2
          focus:outline-none
          focus:ring-2
          focus:ring-pink-500
          focus:ring-offset-2
        "
        @click.prevent="state.toggle"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-8 w-8 text-gray-800"
          fill="currentColor"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h16m-7 6h7"
          />
        </svg>
      </button>
    </div>
    <div class="col-span-10 ml-auto hidden lg:inline-block">
      <ul class="flex w-full flex-row justify-center space-x-6">
        <kamen-page-menu />
      </ul>
    </div>
  </div>
  <div
    :class="[state.open ? 'flex flex-col' : 'hidden']"
    class="divide-y divide-gray-200 border-t bg-white shadow lg:hidden"
  >
    <!-- <div class="p-4">
      <kamen-search-button class="w-full" @click.prevent="search.toggle" />
    </div> -->

    <ul class="flex flex-col divide-y divide-gray-200">
      <kamen-page-menu />
    </ul>
  </div>
</template>
<script setup>
import { useState } from "Kamen/stores/state";
import { useSearch } from "Kamen/stores/search";

const props = defineProps({
  logo: Object,
});

const state = useState();
const search = useSearch();
</script>
