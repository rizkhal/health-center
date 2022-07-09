<style>
/* option list display between */
.multiselect-option {
  align-items: unset !important;
  justify-content: space-between !important;
}
</style>
<template>
  <div>
    <Multiselect
      :object="true"
      :v-bind="$attrs"
      v-model="modelValue"
      placeholder="Choose a programming language"
      :filter-results="false"
      :min-chars="1"
      :resolve-on-load="false"
      :delay="0"
      :searchable="true"
      :options="props.options"
    />
  </div>
</template>
<script setup>
import { watch, onMounted } from "vue";
import Multiselect from "@vueform/multiselect";
import { multiSelectClasses } from "./multi-select-classes";

const props = defineProps({
  error: {
    type: String,
    required: false,
    default: null,
  },
  modelValue: {
    type: Object,
  },
  options: {
    type: [Function, Array, Object],
  },
});

const emit = defineEmits(["update:modelValue"]);

watch(
  () => props.modelValue,
  (value) => {
    emit("update:modelValue", value);
  },
);
</script>
