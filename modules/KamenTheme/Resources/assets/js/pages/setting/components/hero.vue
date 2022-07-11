<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  hero: Object,
});

const form = useForm({
  id: props.hero?.id,
  title: props.hero?.title,
  summary: props.hero?.summary,
});

const submit = () => {
  form.post(route("dashboard.kamen-theme.setting.hero"));
};
</script>
<template>
  <v-form-container title="Halaman Utama" @onSubmit="submit">
    <div class="flex flex-col space-y-4 mt-4">
      <v-text
        label="Judul"
        name="title"
        v-model="form.title"
        :error="form.errors.title"
      />
      <v-textarea
        name="summary"
        label="Deskripsi"
        v-model="form.summary"
        :error="form.errors.summary"
      />
    </div>
  </v-form-container>
</template>