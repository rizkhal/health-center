<script setup>
const props = defineProps({
  title: String,
  logo: Object,
});
</script>
<template>
  <div>
    <v-app-head :title="title" />

    <div class="bg-gray-100">
      <kamen-banner />

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
        <kamen-floating-button />
        <!-- only show if user is authenticated -->
        <!-- <kamen-button-dashboard v-if="$page.props.auth.user" /> -->
      </div>

      <!-- page footer -->
      <kamen-footer />
    </div>
  </div>
</template>