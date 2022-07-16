<script setup>
import { inject } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

const modal = inject("$modal");

defineProps({
  title: String,
  options: Object,
});

const form = useForm({
  option: null,
});

const submit = () => {
  form.post(route("dashboard.backup.create"), {
    onSuccess: () => modal.close(),
  });
};
</script>
<template>
  <v-form-container
    :title="title"
    @onSubmit="submit"
    submit-text="Buat"
    :loading="form.processing"
  >
    <v-select
      v-model="form.option"
      :error="form.errors.option"
      label="Opsi Pencadangan"
      :required="true"
    >
      <option
        v-for="(option, index) in options"
        :key="index"
        :value="option.value"
      >
        {{ option.label }}
      </option>
    </v-select>
  </v-form-container>
</template>