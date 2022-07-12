<template>
  <div class="relative">
    <v-app-link
      :href="$route('dashboard.dashboard')"
      class="fixed bottom-5 right-5 flex flex-row items-center rounded-lg bg-pink-500/80 py-2 px-3 text-white focus:ring-2 focus:ring-pink-500/80 focus:ring-offset-2 focus:ring-offset-current"
    >
      <v-icon name="LoginIcon" type="outline" class="h-8 w-8" />
      <span class="ml-2">Dashboard</span>
    </v-app-link>
  </div>
</template>
