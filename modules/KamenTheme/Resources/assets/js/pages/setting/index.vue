<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

// child component
import SettingLogo from "./components/logo.vue";
import SettingHero from "./components/hero.vue";

defineProps({
  hero: Object,
  logo: Object,
});
</script>
<template>
  <div class="grid grid-cols-2 gap-4">
    <SettingLogo :logo="logo" />
    <SettingHero :hero="hero" />
  </div>
</template>