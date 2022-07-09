<template>
  <div class="grid grid-cols-4 gap-4">
    <v-app-link
      :href="$route(item.setting.route)"
      v-for="(item, index) in settings"
      :key="index"
      class="w-full rounded-md bg-purple-500 p-4 text-white shadow"
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
