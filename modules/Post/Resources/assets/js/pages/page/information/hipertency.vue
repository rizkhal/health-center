<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  hipertency: Object,
});

const form = useForm({
  content: props.hipertency?.content,
});

const submit = () => {
  form.post(route("dashboard.post.page.information"));
};
</script>
<template>
  <div class="p-5">
    <div>
      <v-editor
        :required="true"
        label="Hipertensi"
        v-model="form.content"
        :value="hipertency?.content"
        style="height: 300px"
        @input="
          (value) => {
            form.content = value;
          }
        "
      />
    </div>
    <div class="mt-24">
      <v-editor
        :required="true"
        label="Hipertensi"
        v-model="form.content"
        :value="hipertency?.content"
        style="height: 300px"
        @input="
          (value) => {
            form.content = value;
          }
        "
      />
    </div>
  </div>
  <button class="btn btn-purple mt-16" @click.stop="submit">Simpan</button>
</template>
