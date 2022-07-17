<script setup>
import { ref, onMounted } from "vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
  filters: Object,
});

const model = ref(null);

onMounted(() => {
  if (props.filters?.hasOwnProperty("search")) {
    model.value = props.filters["search"];
  }
});

const search = () => {
  Inertia.get(
    route("post.article"),
    {
      search: model.value,
    },
    {
      replace: true,
      preserveState: true,
    },
  );
};
</script>
<template>
  <form @submit.prevent="search">
    <div class="relative mt-2 flex w-full items-stretch space-x-1">
      <input
        type="text"
        name="search"
        v-model="model"
        placeholder="Cari artikel.."
        class="relative w-px flex-auto flex-shrink flex-grow rounded-lg border-2 border-gray-300 bg-white p-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
      />
      <div class="flex">
        <button
          type="submit"
          class="whitespace-no-wrap text-grey-dark flex items-center rounded-lg bg-pink-500 px-3 text-sm leading-normal focus:ring-2 focus:ring-pink-500 focus:ring-offset-2"
        >
          <v-icon
            name="SearchIcon"
            type="outline"
            class="h-8 w-8 text-pink-200"
          />
        </button>
      </div>
    </div>
  </form>
</template>
