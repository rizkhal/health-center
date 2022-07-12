<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

// child component
import SettingLogo from "./components/logo.vue";
import SettingHero from "./components/hero.vue";
import VissionMission from "./components/vission-mission.vue";

defineProps({
  hero: Object,
  logo: Object,
  vission: Object,
});
</script>
<template>
  <div class="grid grid-cols-2 gap-4 mb-6">
    <SettingLogo :logo="logo" />
    <SettingHero :hero="hero" />
  </div>
  <div>
    <VissionMission :vm="vission" />
  </div>
</template>