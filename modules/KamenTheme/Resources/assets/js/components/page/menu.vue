<template>
  <li>
    <v-app-link
      :href="$route('post.home')"
      :class="active('KamenTheme::index')"
      class="flex flex-row items-center p-4 lg:p-0"
    >
      Beranda
    </v-app-link>
  </li>
  <li>
    <v-app-link
      :href="$route('post.article')"
      :class="
        active('KamenTheme::article/index') ||
        active('KamenTheme::article/show')
      "
      class="flex flex-row items-center p-4 lg:p-0"
    >
      Artikel
    </v-app-link>
  </li>
  <li>
    <v-app-link
      :href="$route('post.facility')"
      :class="active('KamenTheme::page/facility')"
      class="flex flex-row items-center p-4 lg:p-0"
    >
      Fasilitas
    </v-app-link>
  </li>
  <li>
    <v-app-link
      :href="$route('post.satisfaction')"
      :class="active('KamenTheme::page/satisfaction')"
      class="flex flex-row items-center p-4 lg:p-0"
    >
      Kepuasan Masyarakat
    </v-app-link>
  </li>
  <li>
    <v-app-link
      :href="$route('post.service')"
      :class="active('KamenTheme::page/service')"
      class="flex flex-row items-center p-4 lg:p-0"
    >
      Pelayanan
    </v-app-link>
  </li>
  <li>
    <v-app-link
      :href="$route('post.information')"
      :class="active('KamenTheme::page/information')"
      class="flex flex-row items-center p-4 lg:p-0"
    >
      Informasi
    </v-app-link>
  </li>
</template>
<script setup>
import { usePage } from "@inertiajs/inertia-vue3";

const page = usePage();

// TODO: FIX ACTIVE COMPONENT STATE
const active = (component) => {
  return {
    "text-pink-500 font-semibold": page.component.value === component,
  };
};
</script>
