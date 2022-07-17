<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  information: Object,
});
const form = useForm({
  content: props.information?.content,
});

const submit = () => {
  form.post(route("dashboard.post.page.submit.information"));
};
</script>
<template>
  <div class="p-5">
    <v-editor
      :required="true"
      label="Informasi"
      v-model="form.content"
      :value="information?.content"
      style="height: 700px"
      @input="
        (value) => {
          form.content = value;
        }
      "
    />
  </div>
  <button class="btn btn-purple mt-16" @click.stop="submit">Simpan</button>
</template>
