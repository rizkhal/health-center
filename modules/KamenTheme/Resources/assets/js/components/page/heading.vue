<template>
  <div
    :class="{ 'flex items-center justify-between': rightText }"
    class="relative mb-4 md:mb-[2em]"
  >
    <h1 class="text-3xl font-semibold">
      {{ title }}
    </h1>
    <span class="absolute -bottom-2 h-[6px] w-20 bg-pink-500" />

    <v-app-link
      href="#"
      v-show="rightText"
      class="text-md font-semibold text-gray-600"
    >
      {{ rightText }}
    </v-app-link>
  </div>
</template>
<script>
export default {
  props: {
    title: {
      type: String,
      required: true,
    },
    rightText: {
      type: String,
      default: null,
    },
  },
};
</script>
