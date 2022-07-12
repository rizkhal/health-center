<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  vm: Object,
});

const form = useForm({
  vission: null,
  mission: null,
});

const save = () => {
  form.post(route("dashboard.kamen-theme.setting.vission-misson"));
};
</script>
<template>
  <v-form-container title="Visi &#38; Misi" @onSubmit="save">
    <div class="flex flex-col space-y-14">
      <v-editor
        label="Visi"
        :value="form.vission"
        style="height: 400px"
        :error="form.errors.vission"
        @input="
          (value) => {
            form.vission = value;
          }
        "
      />

      <v-editor
        label="Misi"
        :value="form.mission"
        style="height: 400px"
        :error="form.errors.mission"
        @input="
          (value) => {
            form.mission = value;
          }
        "
      />

      <div class="flex flex-row space-x-2 items-center">
        <div class="w-full">
          <v-text />
        </div>
        <button class="btn-purple py-3">
          <v-icon name="PlusIcon" class="w-4 h-4" />
        </button>
      </div>
    </div>
  </v-form-container>
</template>