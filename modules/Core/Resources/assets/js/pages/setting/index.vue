<template>
  <div class="grid grid-cols-4 gap-4">
    <v-app-link
      :href="$route(item.setting.route)"
      v-for="(item, index) in settings"
      :key="index"
      class="bg-purple-500 w-full p-4 rounded-md shadow text-white"
    >
      {{ item.name }}
    </v-app-link>
  </div>
</template>
<script>
export default {
  props: {
    settings: Object,
  },
};
</script>