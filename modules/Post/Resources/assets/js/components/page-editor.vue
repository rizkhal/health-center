<script setup>
const emit = defineEmits(["update:modelValue", "onSubmit"]);

const props = defineProps({
  value: {
    type: String,
    default: "",
  },
  modelValue: {
    type: [String, undefined],
  },
  height: {
    type: Number,
    default: 300,
  },
  label: {
    type: String,
    required: true,
  },
});
</script>
<template>
  <div class="p-4">
    <v-editor
      :required="true"
      :label="label"
      v-model="modelValue"
      :value="value"
      :style="`height: ${height}px`"
      @input="
        (value) => {
          $emit('update:modelValue', value);
        }
      "
    />
    <button class="btn btn-purple mt-10" @click.stop="$emit('onSubmit')">
      Simpan
    </button>
  </div>
</template>