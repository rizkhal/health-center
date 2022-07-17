<script setup>
import { MEDIA_SOCIAL } from "../utils/enum";

const props = defineProps({
  title: String,
  logo: Object,
  media_socials: Object,
});
</script>
<template>
  <div>
    <v-app-head :title="title" />

    <div class="bg-gray-100">
      <kamen-banner :media-socials="media_socials" />

      <!-- page header -->
      <kamen-header :logo="logo" />

      <!-- slot -->
      <transition
        enter-active-class="duration-500 ease-out"
        enter-from-class="transform translate-y-10 opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="duration-300 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="transform translate-y-10 opacity-0"
      >
        <div :key="$page.url">
          <slot />
        </div>
      </transition>

      <!-- search modal -->
      <kamen-search-modal />

      <div>
        <kamen-floating-button
          :whatsapp="
            media_socials.filter(
              (v) => v.type === MEDIA_SOCIAL.WHATSAPP.value,
            )[0]
          "
        />
        <!-- only show if user is authenticated -->
        <!-- <kamen-button-dashboard v-if="$page.props.auth.user" /> -->
      </div>

      <!-- page footer -->
      <kamen-footer />
    </div>
  </div>
</template>
