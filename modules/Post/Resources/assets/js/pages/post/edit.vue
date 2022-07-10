<template>
  <div class="mb-[100px] grid grid-cols-12 gap-4">
    <div class="col-span-12 min-h-screen lg:col-span-8">
      <v-editor
        v-model="form.content"
        :value="form.content"
        @input="
          (value) => {
            form.content = value;
          }
        "
      />
    </div>
    <div class="col-span-12 lg:col-span-4">
      <div class="flex flex-col space-y-4 rounded bg-gray-100 p-4 shadow">
        <v-text
          label="Title"
          :required="true"
          v-model="form.title"
          :error="form.errors.title"
        />
        <v-multi-select
          label="Category"
          :required="true"
          :create-option="true"
          v-model="form.category"
          :error="form.errors.category"
          :options="
            async (query) => await useSelect().select(query, `/v1/categories`)
          "
        />
        <div class="flex flex-row space-x-2">
          <v-button
            text="Ubah"
            @click.prevent="save"
            :loading="form.processing"
          />
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { useSelect } from "~/stores";

const props = defineProps({
  post: Object,
});

const form = useForm({
  title: props.post.title,
  category: {
    value: props.post.category.id,
    label: props.post.category.name,
  },
  content: props.post.content,
});

const save = () => {
  form.put(
    route("dashboard.post.post.update", {
      post: props.post.id,
    }),
    {
      onSuccess: () => {
        form.reset();
      },
    },
  );
};
</script>
