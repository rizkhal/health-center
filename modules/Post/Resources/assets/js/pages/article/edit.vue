<script setup>
import { ref } from "vue";
import { useSelect } from "~/stores";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  post: Object,
});

const selectedImage = ref(null);

const form = useForm({
  title: props.post.title,
  content: props.post.content,
  category: {
    value: props.post.category.id,
    label: props.post.category.name,
  },
  cover: props.post.image.url,
});

const update = () => {
  form
    .transform((data) => ({
      ...data,
      _method: "PUT",
      cover: selectedImage.value ?? props.post.image.url,
    }))
    .post(
      route("dashboard.post.post.update", {
        post: props.post.id,
      }),
    );
};

const handleImagePicker = (file) => {
  selectedImage.value = file;
};
</script>
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
      <div class="flex flex-col space-y-4 rounded bg-white p-4 shadow">
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

        <v-image-picker
          label="Thumbnail"
          :required="true"
          @pick="handleImagePicker"
          :error="form.errors.cover"
          :current-image="props.post.image.url"
        />

        <div class="flex flex-row space-x-2">
          <v-button
            text="Ubah"
            @click.prevent="update"
            :loading="form.processing"
          />
        </div>
      </div>
    </div>
  </div>
</template>
