<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  satisfaction: Object,
});
const form = useForm({
  content: props.satisfaction?.content,
});

const submit = () => {
  form.post(route("dashboard.post.page.submit.satisfaction"));
};
</script>
<template>
  <div class="p-5">
    <v-editor
      :required="true"
      label="Kepuasan Masyarakat"
      v-model="form.content"
      :value="satisfaction?.content"
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
