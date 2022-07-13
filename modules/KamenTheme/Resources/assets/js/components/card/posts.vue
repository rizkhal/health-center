<script setup>
import { computed, onMounted } from "vue";

const props = defineProps({
  size: {
    type: String,
    default: "lg", // lg and sm
  },
  items: Object,
});

const lg = computed(() => props.size == "lg");
const sm = computed(() => props.size == "sm");
</script>
<template>
  <kamen-post-card v-for="(item, index) in items" :key="index" :item="item" />
</template>
