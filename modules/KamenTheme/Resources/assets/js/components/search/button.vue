<template>
  <div
    @click.prevent="$emit('open')"
    class="flex h-10 cursor-pointer flex-row items-center rounded-lg border-2 border-gray-300 bg-white text-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-500"
  >
    <v-icon name="SearchIcon" class="ml-3 h-6 w-6 text-gray-600" />
    <span class="ml-2 font-medium text-gray-400">Cari disini...</span>
    <span
      class="ml-auto mr-3 rounded-md bg-gray-300 p-1 font-bold text-gray-600"
      >{{ keyboardShortcut }}</span
    >
  </div>
</template>
<script setup>
defineEmits(["open"]);

const isAppleOS = () => {
  const platform =
    navigator?.userAgentData?.platform || navigator?.platform || "unknown";

  return /(Mac|iPhone|iPod|iPad)/i.test(platform);
};

const keyboardShortcut = isAppleOS() ? "⌘K" : "Ctrl K";
</script>
