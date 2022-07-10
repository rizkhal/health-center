<template>
  <div class="mb-[100px] grid grid-cols-12 gap-4">
    <div class="col-span-12 min-h-screen lg:col-span-8">
      <v-editor
        v-model="form.content"
        @input="
          (value) => {
            form.content = value;
          }
        "
      />
    </div>
    <div class="col-span-12 lg:col-span-4">
      <div class="flex flex-col space-y-4 rounded bg-gray-200 p-4 shadow">
        <v-text
          label="Judul"
          :required="true"
          v-model="form.title"
          :error="form.errors.title"
        />
        <v-multi-select
          v-model="form.category"
          :required="true"
          label="Kategori"
          :options="
            async (query) => await useSelect().select(query, `/v1/categories`)
          "
        />
        <v-text label="Cover" type="file" />
        <div class="flex flex-row space-x-2">
          <v-button
            text="Simpan"
            @click.prevent="save"
            :loading="form.processing"
          />
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { watch } from "vue";
import { useSelect } from "~/stores";
import { slugable } from "~/utils/helper";
import { useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
  title: null,
  slug: null,
  category: null,
  content: null,
});

const save = () => {
  form.post(route("dashboard.post.post.store"), {
    onSuccess: () => console.log("success"),
  });
};

watch(
  () => form.title,
  (newValue) => {
    form.slug = slugable(newValue);
  },
);
</script>
