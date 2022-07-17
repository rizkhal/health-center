<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  facility: Object,
});
const form = useForm({
  content: props.facility?.content,
});

const submit = () => {
  form.post(route("dashboard.post.page.submit.facility"));
};
</script>
<template>
  <div>
    <div>
      <v-editor
        :required="true"
        label="Fasilitas"
        v-model="form.content"
        :value="facility?.content"
        style="height: 700px"
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
