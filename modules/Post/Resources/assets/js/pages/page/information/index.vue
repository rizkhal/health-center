<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  phbs: Object,
  bpjs: Object,
  covid: Object,
  hipertency: Object,
  service_schedules: Object,
});

const hipertency = useForm({
  content: props.hipertency?.content,
});
const phbs = useForm({
  content: props.phbs?.content,
});
const service_schedules = useForm({
  content: props.service_schedules?.content,
});
const bpjs = useForm({
  content: props.bpjs?.content,
});
const covid = useForm({
  content: props.covid?.content,
});
</script>
<template>
  <div class="flex flex-col space-y-4">
    <v-page-editor
      label="Hipertency"
      :value="hipertency?.content"
      v-model="hipertency.content"
      @onSubmit="
        () => {
          hipertency.post($route('dashboard.post.page.information.hipertency'));
        }
      "
    />

    <v-page-editor
      label="Phbs"
      :value="phbs?.content"
      v-model="phbs.content"
      @onSubmit="
        () => {
          phbs.post($route('dashboard.post.page.information.phbs'));
        }
      "
    />

    <v-page-editor
      label="Jadwal Pelayanan"
      :value="service_schedules?.content"
      v-model="service_schedules.content"
      @onSubmit="
        () => {
          service_schedules.post(
            $route('dashboard.post.page.information.service_schedules'),
          );
        }
      "
    />

    <v-page-editor
      label="Bpjs"
      :value="bpjs?.content"
      v-model="bpjs.content"
      @onSubmit="
        () => {
          bpjs.post($route('dashboard.post.page.information.bpjs'));
        }
      "
    />

    <v-page-editor
      label="Covid"
      :value="covid?.content"
      v-model="covid.content"
      @onSubmit="
        () => {
          covid.post($route('dashboard.post.page.information.covid'));
        }
      "
    />
  </div>
</template>
