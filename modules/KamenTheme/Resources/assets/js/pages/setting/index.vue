<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

// child component
import SettingLogo from "./components/logo.vue";
import SettingHero from "./components/hero.vue";
import MediaSocial from "./components/media-social.vue";
import VissionMission from "./components/vission-mission.vue";

defineProps({
  hero: Object,
  logo: Object,
  vission: Object,
  media_socials: Object,
  media_socials_accounts: Object,
});
</script>
<template>
  <div class="mb-6 grid grid-cols-2 gap-4">
    <SettingLogo :logo="logo" />
    <SettingHero :hero="hero" />
  </div>
  <div>
    <MediaSocial :socials="media_socials" :accounts="media_socials_accounts" />
    <VissionMission :vm="vission" />
  </div>
</template>
