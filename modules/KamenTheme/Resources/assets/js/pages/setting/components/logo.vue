<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

const selectedImage = ref(null);

const props = defineProps({
  logo: Object,
});

const form = useForm({
  logo: props.logo?.logo,
  logo_alt: props.logo?.logo_alternative,
});

function handleFileUpload(file) {
  form.logo = file;

  let reader = new FileReader();
  reader.onload = (e) => (selectedImage.value = e.target.result);
  reader.readAsDataURL(file);
}

const submit = () => {
  form.post(route("dashboard.kamen-theme.setting.logo"));
};
</script>
<template>
  <v-form-container title="Logo Aplikasi" @onSubmit="submit">
    <div class="flex flex-col space-y-4">
      <div class="flex flex-col items-center justify-center mb-8">
        <input
          ref="logo"
          type="file"
          accept="image/*"
          style="display: none"
          @input="handleFileUpload($event.target.files[0])"
        />
        <img
          class="w-full rounded-md border shadow dark:border-cool-gray-800"
          @click.prevent="$refs.logo.click()"
          :class="{ 'border-red-500': form.errors.logo }"
          :src="
            selectedImage ? selectedImage : logo?.logo || '/images/default.png'
          "
        />
        <div v-if="form.errors.logo" class="form-error">
          {{ form.errors.logo }}
        </div>
      </div>

      <v-text
        type="text"
        label="Logo Alt"
        v-model="form.logo_alt"
        :error="form.errors.logo_alt"
      />
    </div>
  </v-form-container>
</template>