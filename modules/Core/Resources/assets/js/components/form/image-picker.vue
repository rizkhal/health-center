<script setup>
import { ref } from "vue";

const props = defineProps({
  label: {
    type: String,
    default: null,
  },
  error: {
    type: String,
    default: null,
  },
  currentImage: {
    type: String,
    default: null,
  },
  required: {
    type: Boolean,
    default: false,
  },
});

const selectedImage = ref(null);

const emit = defineEmits(["pick"]);

function onPickImage(event) {
  const file = event.target.files[0];

  let reader = new FileReader();
  reader.onload = (e) => (selectedImage.value = e.target.result);
  reader.readAsDataURL(file);

  emit("pick", file);
}
</script>
<template>
  <div>
    <div v-if="label" class="form-label text-left text-sm capitalize">
      {{ label }} <span v-if="required" class="text-xs text-red-500">*</span>
    </div>
    <div class="flex flex-col justify-center">
      <input
        ref="logo"
        type="file"
        accept="image/*"
        style="display: none"
        @input="onPickImage"
      />
      <img
        class="dark:border-cool-gray-800 w-full rounded-md border shadow"
        @click.prevent="$refs.logo.click()"
        :class="{ 'border-red-500': error }"
        :src="
          selectedImage ? selectedImage : currentImage || '/images/default.png'
        "
      />
    </div>
    <div v-if="error" class="form-error">
      {{ error }}
    </div>
  </div>
</template>
